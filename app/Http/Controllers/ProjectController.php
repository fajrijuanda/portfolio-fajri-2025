<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        $categories = Project::categories();
        
        return view('welcome', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        $project->load('images');
        
        // Get related projects (same category, excluding current)
        $relatedProjects = Project::where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();
        
        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
