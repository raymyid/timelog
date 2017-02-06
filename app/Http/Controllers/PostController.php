<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Webpatser\Uuid\Uuid;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(25, ['*'], 'pn');
        return view('post.index')->with('posts', $posts);
    }

    public function show($value)
    {
        $post_id = uuid_convert($value, true);
        if (strlen($post_id) !== 36) { return response('404', 404); }

        $post = Post::where('post_id', $post_id)->first();

        return view('post.show')->with('post', $post);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'post_title' => 'required|unique:posts|max:255',
            'post_content' => 'required',
        ]);

        $post = new Post;

        $post->post_id = Uuid::generate();
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;

        $post->save();

        return redirect()->route('post.show', uuid_convert($post->post_id));
    }
}
