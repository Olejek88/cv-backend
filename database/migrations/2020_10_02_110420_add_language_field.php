<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLanguageField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project', function (Blueprint $table) {
            $table->string('title_en');
            $table->string('title_de');
            $table->string('description_en');
            $table->string('description_de');
        });
        Schema::table('photo', function (Blueprint $table) {
            $table->string('title_en');
            $table->string('title_de');
        });
        Schema::table('category', function (Blueprint $table) {
            $table->string('title_en');
            $table->string('title_de');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
