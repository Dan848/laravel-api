<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technology', 'dev_languages')->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('technology', 'dev_languages')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Project does not exist!'
            ]);
        }
    }
}
