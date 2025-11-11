<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'API',
        'version' => '1.0',
        'endpoints' => [
            'GET /api' => 'API information',
            'GET /api/test' => 'Test endpoint',
            'GET /api/user' => 'Get authenticated user (requires token)',
            'GET /api/posts' => 'List all published blog posts',
            'GET /api/posts/{slug}' => 'Get a single blog post by slug',
            'GET /api/projects' => 'List all projects',
            'GET /api/projects/{slug}' => 'Get a single project by slug',
        ],
        'message2' => "if u set env on postman, variable = url, value = http://127.0.0.1/api",
        'endpoints with {{url}} env' => [
            'GET /' => 'API information',
            'GET /test' => 'Test endpoint',
            'GET /user' => 'Get authenticated user (requires token)',
            'GET /posts' => 'List all published blog posts',
            'GET /posts/{slug}' => 'Get a single blog post by slug',
            'GET /projects' => 'List all projects',
            'GET /projects/{slug}' => 'Get a single project by slug',
        ],
    ]);
});


Route::get('/test', function () {
    return response()->json([
        'message' => 'API TEST !',
        'timestamp' => now(),
    ]);
});


Route::get('/posts', [BlogController::class, 'index']);
Route::get('/posts/{slug}', [BlogController::class, 'show']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{slug}', [ProjectController::class, 'show']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
