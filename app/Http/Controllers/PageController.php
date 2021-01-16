<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PageController extends Controller
{
    public function posts()
    {
        $posts = Post::with('user')->orderBy('id','desc')->paginate(2);

        return view('blog.posts', [
            'posts' => $posts
        ]);
    }

    public function post(Post $post)
    {
        return view('blog.post', ['post' => $post]);
    }
}
