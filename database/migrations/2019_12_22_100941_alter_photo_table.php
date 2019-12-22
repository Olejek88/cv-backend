<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photo', function (Blueprint $table) {
            $table->bigInteger('project_id')->unsigned();
        });
        Schema::table('photo', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        return true;
        //
    }
}
