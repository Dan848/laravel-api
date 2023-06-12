<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Dev_Language;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $dev_languages = Dev_Language::all();
        $technologies = Technology::all();
        return view("admin.projects.create", compact("technologies", "dev_languages"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        //Add Slug
        $data["slug"] = Str::slug($request->repo_name, "-");
        //Store Image
        if($request->hasFile("image")){
            $img_path = Storage::put ("uploads", $request->image);
            $data["image"] = asset("storage/" . $img_path);
        }
        $newProject = Project::create($data);

            //Attach Foreign data from another table
            if ($request->has("dev_languages")){
                $newProject->dev_languages()->attach($request->dev_languages);
            }
        return redirect()->route("admin.projects.show", $newProject->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        $dev_languages = Dev_Language::all();
        return view("admin.projects.edit", compact("project", "technologies", "dev_languages"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data["slug"] = Str::slug($request->repo_name, "-");

        if ($request->hasFile("image")){
            if ($project->image) {
                Storage::delete($project->image);
            }
            $img_path = Storage::put("uploads", $request->image);
            $data["image"] = asset("storage/" . $img_path);
        }
        $project->update($data);

            //Attach Foreign data from another table
            if ($request->has("dev_languages")){
                $project->dev_languages()->sync($request->dev_languages);
            }
            else {
                $project->sync([]);
            }
        return redirect()->route("admin.projects.show",$project->slug)->with("message", "$project->name è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return redirect()->route("admin.projects.index")->with("message", "$project->name è stato eliminato con successo");
    }
}
