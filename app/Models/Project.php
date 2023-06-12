<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function technology(){
        return $this->belongsTo(Technology::class);
    }

    public function dev_languages(){
        return $this->belongsToMany(Dev_Language::class);
    }
}
