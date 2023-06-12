<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = config("db_projectd.technologies");
        foreach($technologies as $technology){
            $newTechnology = new Technology;
            $newTechnology->name = $technology["name"];
            $newTechnology->slug = Str::slug($newTechnology->name, "-");
            $newTechnology->image = $technology["image"];
            $newTechnology->save();
        }
    }
}
