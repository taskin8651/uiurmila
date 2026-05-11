<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryPagesTable extends Migration
{
    public function up()
    {
        Schema::create('gallery_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_primary_button_text')->nullable();
            $table->string('hero_primary_button_link')->nullable();
            $table->string('hero_secondary_button_text')->nullable();
            $table->string('hero_secondary_button_link')->nullable();
            $table->string('hero_feature_icon')->nullable();
            $table->string('hero_feature_title')->nullable();
            $table->text('hero_feature_text')->nullable();
            $table->string('hero_image_one')->nullable();
            $table->string('hero_image_two')->nullable();
            $table->string('hero_image_three')->nullable();
            $table->string('hero_image_four')->nullable();
            $table->string('photos_badge')->nullable();
            $table->string('photos_title')->nullable();
            $table->text('photos_description')->nullable();
            $table->string('filter_one')->nullable();
            $table->string('filter_two')->nullable();
            $table->string('filter_three')->nullable();
            $table->string('filter_four')->nullable();
            $table->string('filter_five')->nullable();
            $table->string('filter_six')->nullable();
            $table->string('albums_badge')->nullable();
            $table->string('albums_title')->nullable();
            $table->text('albums_description')->nullable();
            $table->string('videos_badge')->nullable();
            $table->string('videos_title')->nullable();
            $table->text('videos_description')->nullable();
            $table->string('videos_button_text')->nullable();
            $table->string('videos_button_link')->nullable();
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
        Schema::dropIfExists('gallery_pages');
    }
}
