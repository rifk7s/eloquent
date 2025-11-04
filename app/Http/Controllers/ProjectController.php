<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = Project::with('user')->ordered()->get();

        return view('projects', compact('projects'));
    }

    /**
     * Display the specified project.
     */
    public function show($slug)
    {
        $project = Project::with('user')->where('slug', $slug)->firstOrFail();

        return view('project-detail', compact('project'));
    }
}
