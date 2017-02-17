<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Purifier;
use Ramsey\Uuid\Uuid;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'show2']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(25);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = new Post;

        $post->id = Uuid::uuid1();
        $post->user_id = $request->user()->id;
        $post->title = $request->title;
        $post->content = Purifier::clean($request->content);

        $post->save();

        return redirect()->route('posts.show2', uuid_decode($post->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show2($id)
    {
        $post = Post::where('id', uuid_encode($id))->first();

        if (is_null($post)) { return '404'; }

        return view('posts.show')->with('post', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // 验证是否为 post 拥有者
        if (strcmp(auth()->user()->id, $post->user_id) !== 0)
        {
            return redirect(route('posts.show2', uuid_decode($post->id)));
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // 校验请求的参数
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // 校验用户 id 是否为 post 的所有者 id
        if (strcmp($request->user()->id, $post->user_id) !== 0)
        {
            return redirect(route('posts.show2', uuid_decode($post->id)));
        }

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return redirect(route('posts.show2', $post->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
