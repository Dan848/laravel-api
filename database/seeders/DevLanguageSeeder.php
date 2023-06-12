<?php

namespace Database\Seeders;

use App\Models\Dev_Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DevLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = config("db_projectd.dev_languages");
        foreach($languages as $language){
            $newDevLanguages = new Dev_Language;
            $newDevLanguages->name = $language["name"];
            $newDevLanguages->slug = Str::slug($newDevLanguages->name, "-");
            $newDevLanguages->image = $language["image"];
            $newDevLanguages->save();
        }
    }
}
