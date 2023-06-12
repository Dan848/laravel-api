<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev__language_project', function (Blueprint $table) {
            $table->unsignedBigInteger("dev__language_id");
            $table->unsignedBigInteger("project_id");

            $table->primary(['dev__language_id', 'project_id']);

            $table->foreign("dev__language_id")->references("id")->on("dev__languages");
            $table->foreign("project_id")->references("id")->on("projects");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dev__language_project');
    }
};
