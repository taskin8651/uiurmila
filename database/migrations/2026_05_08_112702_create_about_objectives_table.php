<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutObjectivesTable extends Migration
{
    public function up()
    {
        Schema::create('about_objectives', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->text('title');
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_objectives');
    }
}