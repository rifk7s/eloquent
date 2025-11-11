<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        $projects = Project::with('user:id,name,email')
            ->ordered()
            ->get()
            ->map(function ($project) {
                return [
                    'id' => $project->id,
                    'title' => $project->title,
                    'slug' => $project->slug,
                    'type' => $project->type,
                    'image' => $project->image,
                    'languages' => $project->languages,
                    'is_featured' => $project->is_featured,
                    'user' => [
                        'id' => $project->user->id,
                        'name' => $project->user->name,
                    ],
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Projects retrieved successfully, For the full detail check projects/slug endpoint, example: /projects/ruangkerja-cs2-skin-rating  ',
            'data' => $projects,
            'count' => $projects->count(),
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $project = Project::where('slug', $slug)
            ->with('user:id,name,email')
            ->first();

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Project retrieved successfully',
            'data' => $project,
        ]);
    }
}
