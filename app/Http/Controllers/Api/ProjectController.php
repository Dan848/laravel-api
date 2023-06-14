<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technology', 'dev_languages')->paginate(5);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
}
