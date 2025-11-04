<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index()
    {
        $posts = Post::published()
            ->with('user')
            ->latest('published_at')
            ->get();

        return view('blog', compact('posts'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->published()
            ->with('user')
            ->firstOrFail();

        return view('blog-post', compact('post'));
    }
}
