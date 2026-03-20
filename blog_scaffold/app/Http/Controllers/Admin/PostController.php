<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(function (Request $request, $next) {
            if (!$request->session()->get('blog_admin')) {
                return redirect()->route('admin.login');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $posts = BlogPost::query()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:220'],
            'excerpt' => ['nullable', 'string', 'max:300'],
            'body' => ['required', 'string'],
        ]);

        $post = new BlogPost();
        $post->title = $validated['title'];
        $post->slug = BlogPost::makeUniqueSlug($validated['slug'] ?: $validated['title']);
        $post->excerpt = $validated['excerpt'] ?? null;
        $post->body = $validated['body'];
        $post->save();

        return redirect()->route('admin.posts.edit', $post)->with('status', 'Post criado.');
    }

    public function edit(BlogPost $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:220'],
            'excerpt' => ['nullable', 'string', 'max:300'],
            'body' => ['required', 'string'],
        ]);

        $post->title = $validated['title'];
        $post->slug = BlogPost::makeUniqueSlug($validated['slug'] ?: $validated['title'], $post->id);
        $post->excerpt = $validated['excerpt'] ?? null;
        $post->body = $validated['body'];
        $post->save();

        return redirect()->route('admin.posts.edit', $post)->with('status', 'Post atualizado.');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', 'Post removido.');
    }

    public function publish(BlogPost $post)
    {
        $post->published_at = now();
        $post->save();

        return redirect()->route('admin.posts.index')->with('status', 'Post publicado.');
    }

    public function unpublish(BlogPost $post)
    {
        $post->published_at = null;
        $post->save();

        return redirect()->route('admin.posts.index')->with('status', 'Post despublicado.');
    }
}

