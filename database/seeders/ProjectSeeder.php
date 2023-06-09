<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config("db_projectd.projects");
        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->repo_name = $project['repo_name'];
            $newProject->repo_link = $project['repo_link'];
            $newProject->slug = Str::slug($project['repo_name'], '-');
            $newProject->name = $project['name'];
            $newProject->description = $project['description'];
            $newProject->image = $project['image'];
            $newProject->created_on = $project['created_on'];
            $newProject->save();
        }
    }
}
