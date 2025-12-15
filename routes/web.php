<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = Project::orderBy('order')->get();
    $categories = Project::categories();
    return view('welcome', compact('projects', 'categories'));
})->name('home');

Route::get('/project/{project:slug}', function (Project $project) {
    $project->load('images');
    
    // Get related projects (same category)
    $relatedProjects = Project::where('category', $project->category)
        ->where('id', '!=', $project->id)
        ->take(3)
        ->get();
    
    return view('projects.show', compact('project', 'relatedProjects'));
})->name('project.show');
