<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;

class UpgradeOneProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = config("db_projectd.projects");
        $projects = Project::all();

        foreach ($projects as $key => $project) {
            $project->fe_be_oriented = $data[$key]["fe_be_oriented"];
            $project->technology_id = $data[$key]["technology_id"];
            $project->save();
        }
    }
}
