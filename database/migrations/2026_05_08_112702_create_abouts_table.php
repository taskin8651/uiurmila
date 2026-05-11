<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_tag_one')->nullable();
            $table->string('hero_tag_two')->nullable();
            $table->string('hero_tag_three')->nullable();

            // Introduction
            $table->string('intro_image')->nullable();
            $table->string('intro_floating_title')->nullable();
            $table->string('intro_floating_text')->nullable();
            $table->string('intro_badge')->nullable();
            $table->string('intro_title')->nullable();
            $table->text('intro_description_one')->nullable();
            $table->text('intro_description_two')->nullable();

            $table->string('stat_one_number')->nullable();
            $table->string('stat_one_title')->nullable();
            $table->string('stat_two_number')->nullable();
            $table->string('stat_two_title')->nullable();
            $table->string('stat_three_number')->nullable();
            $table->string('stat_three_title')->nullable();

            $table->string('intro_point_one')->nullable();
            $table->string('intro_point_two')->nullable();
            $table->string('intro_point_three')->nullable();

            // Story
            $table->string('story_badge')->nullable();
            $table->string('story_title')->nullable();
            $table->text('story_short_description')->nullable();
            $table->string('story_mini_title')->nullable();
            $table->string('story_mini_text')->nullable();
            $table->text('story_description_one')->nullable();
            $table->text('story_description_two')->nullable();
            $table->string('story_point_one')->nullable();
            $table->string('story_point_two')->nullable();
            $table->string('story_point_three')->nullable();

            // Mission Vision
            $table->string('mission_section_badge')->nullable();
            $table->string('mission_section_title')->nullable();
            $table->text('mission_section_description')->nullable();

            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->string('mission_point_one')->nullable();
            $table->string('mission_point_two')->nullable();

            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->string('vision_point_one')->nullable();
            $table->string('vision_point_two')->nullable();

            // Values Heading
            $table->string('values_badge')->nullable();
            $table->string('values_title')->nullable();
            $table->text('values_description')->nullable();

            // Objectives
            $table->string('objectives_badge')->nullable();
            $table->string('objectives_title')->nullable();
            $table->text('objectives_description')->nullable();

            // Legal
            $table->string('legal_badge')->nullable();
            $table->string('legal_title')->nullable();
            $table->text('legal_description')->nullable();
            $table->string('legal_organization_name')->nullable();
            $table->string('legal_registration_no')->nullable();
            $table->string('legal_pan_details')->nullable();
            $table->text('legal_registered_address')->nullable();
            $table->string('legal_button_text')->nullable();
            $table->string('legal_button_link')->nullable();

            // Founder
            $table->string('founder_image')->nullable();
            $table->string('founder_photo_badge')->nullable();
            $table->string('founder_badge')->nullable();
            $table->string('founder_title')->nullable();
            $table->text('founder_message')->nullable();
            $table->string('founder_designation')->nullable();
            $table->string('founder_organization')->nullable();

            // Goals Heading
            $table->string('goals_badge')->nullable();
            $table->string('goals_title')->nullable();
            $table->text('goals_description')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}