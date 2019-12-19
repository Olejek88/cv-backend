<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateV1Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
        });

        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('path');
        });

        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
        });

        Schema::create('projects_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tags_id')->unsigned();
            $table->bigInteger('projects_id')->unsigned();
        });

        Schema::table('projects_tags', function (Blueprint $table) {
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('projects_id')->references('id')->on('project')->onDelete('cascade');
        });

        Schema::create('projects_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('photos_id')->unsigned();
            $table->bigInteger('projects_id')->unsigned();
        });

        Schema::table('projects_photos', function (Blueprint $table) {
            $table->foreign('photos_id')->references('id')->on('photo')->onDelete('cascade');
            $table->foreign('projects_id')->references('id')->on('project')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project-tag');
        Schema::dropIfExists('project-photo');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('photo');
        Schema::dropIfExists('project');
    }
}
