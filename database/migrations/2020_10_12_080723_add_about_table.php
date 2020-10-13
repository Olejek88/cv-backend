<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('contact');
            $table->text('position');
            $table->text('position_en');
            $table->text('position_de');
            $table->text('courses');
            $table->text('skills');
            $table->text('skills_en');
            $table->text('skills_de');
            $table->text('addition');
            $table->text('addition_en');
            $table->text('addition_de');
            $table->string('image')->default("");
            $table->timestamps();
        });

        Schema::table('career', function (Blueprint $table) {
            $table->string('image')->default("")->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about');
    }
}
