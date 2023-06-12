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
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean("fe_be_oriented")->nullable();
            $table->unsignedBigInteger("technology_id")->nullable();
            $table->foreign("technology_id")->references("id")->on("technologies")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn("fe_be_oriented");
            $table->dropForeign("technology_id");
            $table->dropColumn("technology_id");
        });
    }
};
