<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $technologies = Technology::paginate(10);
        return view("admin.technologies.index", compact("technologies"));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view("admin.technologies.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechnologyRequest  $request

     */
    public function store(StoreTechnologyRequest $request)
    {
        $data = $request->validated();
        $data["slug"] = Str::slug($request->name, "-");
        if($request->hasFile("image")){
            $img_path = Storage::put ("uploads", $request->image);
            $data["image"] = asset("storage/" . $img_path);
        }

        $newTechnology = Technology::create($data);
        return redirect()->route("admin.technologies.show", $newTechnology->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology

     */
    public function show(Technology $technology)
    {
        return view("admin.technologies.show", compact("technology"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology

     */
    public function edit(Technology $technology)
    {
        return view("admin.technologies.edit", compact("technology"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechnologyRequest  $request
     * @param  \App\Models\Technology  $technology

     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $data = $request->validated();
        $data["slug"] = Str::slug($request->repo_name, "-");

        if ($request->hasFile("image")){
            if ($technology->image) {
                Storage::delete($technology->image);
            }
            $img_path = Storage::put("uploads", $request->image);
            $data["image"] = asset("storage/" . $img_path);
        }
        $technology->update($data);
        return redirect()->route("admin.technologies.show",$technology->slug)->with("message", "$technology->name è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology

     */
    public function destroy(Technology $technology)
    {
        if ($technology->image) {
            Storage::delete($technology->image);
        }
        $technology->delete();
        return redirect()->route("admin.technologies.index")->with("message", "$technology->name è stato eliminato con successo");
    }
}
