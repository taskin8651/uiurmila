<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurWorksTable extends Migration
{
    public function up()
    {
        Schema::create('our_works', function (Blueprint $table) {
            $table->id();
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_primary_button_text')->nullable();
            $table->string('hero_primary_button_link')->nullable();
            $table->string('hero_secondary_button_text')->nullable();
            $table->string('hero_secondary_button_link')->nullable();
            $table->string('hero_impact_icon')->nullable();
            $table->string('hero_impact_title')->nullable();
            $table->text('hero_impact_text')->nullable();
            $table->string('hero_mini_one_icon')->nullable();
            $table->string('hero_mini_one_title')->nullable();
            $table->string('hero_mini_two_icon')->nullable();
            $table->string('hero_mini_two_title')->nullable();
            $table->string('hero_mini_three_icon')->nullable();
            $table->string('hero_mini_three_title')->nullable();
            $table->string('hero_mini_four_icon')->nullable();
            $table->string('hero_mini_four_title')->nullable();
            $table->string('categories_badge')->nullable();
            $table->string('categories_title')->nullable();
            $table->text('categories_description')->nullable();
            $table->string('details_badge')->nullable();
            $table->string('details_title')->nullable();
            $table->string('initiatives_badge')->nullable();
            $table->string('initiatives_title')->nullable();
            $table->string('cta_badge')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_primary_button_text')->nullable();
            $table->string('cta_primary_button_link')->nullable();
            $table->string('cta_secondary_button_text')->nullable();
            $table->string('cta_secondary_button_link')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('our_works');
    }
}
