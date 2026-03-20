<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::query()
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('blog.index', ['posts' => $posts]);
    }

    public function show(BlogPost $post)
    {
        if (!$post->published_at) {
            abort(404);
        }

        return view('blog.show', ['post' => $post]);
    }
}

