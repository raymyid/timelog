<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Webpatser\Uuid\Uuid;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index')->withPosts(Post::all());
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
        $post->post_content = $request->post_title;

        $post->save();
    }
}
