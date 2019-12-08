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

        Schema::create('photo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('path');
        });

        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
        });

        Schema::create('project-tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tag');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('project');
        });

        Schema::create('project-photo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('photo_id')->unsigned();
            $table->foreign('photo_id')->references('id')->on('photo');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('project');
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
