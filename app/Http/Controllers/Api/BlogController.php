<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    public function index(): JsonResponse
    {
        $posts = Post::published()
            ->with('user:id,name,email')
            ->latest('published_at')
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt,
                    'featured_image' => $post->featured_image,
                    'published_at' => $post->published_at,
                    'user' => [
                        'id' => $post->user->id,
                        'name' => $post->user->name,
                    ],
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Posts retrieved successfully, For the full detail check post/slug endpoint,    example: /posts/my-portfolio-projects-ruangkerja-cs2-skin-rating',

            'data' => $posts,
            'count' => $posts->count(),
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $post = Post::where('slug', $slug)
            ->published()
            ->with('user:id,name,email')
            ->first();

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Post retrieved successfully',
            'data' => $post,
        ]);
    }
}
