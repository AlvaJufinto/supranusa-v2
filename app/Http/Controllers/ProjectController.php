<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::published()->with('brand')->latest()->get();
        return view('projects.index', compact('projects'));
    }
}
