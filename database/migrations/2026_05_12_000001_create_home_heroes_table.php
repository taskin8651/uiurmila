<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeHeroesTable extends Migration
{
    public function up()
    {
        Schema::create('home_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('badge_icon')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_link')->nullable();
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_link')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('small_card_icon')->nullable();
            $table->string('small_card_title')->nullable();
            $table->string('small_card_text')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_heroes');
    }
}
