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
        Schema::create('tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
        });

        Schema::create('photo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('path');
        });

        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->text('photo')->default(null);
        });

        Schema::create('project_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tag_id')->unsigned();
            $table->bigInteger('project_id')->unsigned();
        });

        Schema::table('project_tag', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
        });

        Schema::create('project_photo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('photo_id')->unsigned();
            $table->bigInteger('project_id')->unsigned();
        });

        Schema::table('project_photo', function (Blueprint $table) {
            $table->foreign('photo_id')->references('id')->on('photo')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
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
        Schema::dropIfExists('tag');
        Schema::dropIfExists('photo');
        Schema::dropIfExists('project');
    }
}
