<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignPagesTable extends Migration
{
    public function up()
    {
        Schema::create('campaign_pages', function (Blueprint $table) {
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
            $table->string('hero_mini_one_icon')->nullable();
            $table->string('hero_mini_one_title')->nullable();
            $table->string('hero_mini_two_icon')->nullable();
            $table->string('hero_mini_two_title')->nullable();
            $table->string('hero_mini_three_icon')->nullable();
            $table->string('hero_mini_three_title')->nullable();
            $table->string('hero_mini_four_icon')->nullable();
            $table->string('hero_mini_four_title')->nullable();
            $table->string('events_badge')->nullable();
            $table->string('events_title')->nullable();
            $table->text('events_description')->nullable();
            $table->string('filter_one')->nullable();
            $table->string('filter_two')->nullable();
            $table->string('filter_three')->nullable();
            $table->string('filter_four')->nullable();
            $table->string('filter_five')->nullable();
            $table->string('gallery_badge')->nullable();
            $table->string('gallery_title')->nullable();
            $table->text('gallery_description')->nullable();
            $table->string('gallery_button_text')->nullable();
            $table->string('gallery_button_link')->nullable();
            $table->string('gallery_image_one')->nullable();
            $table->string('gallery_image_two')->nullable();
            $table->string('gallery_image_three')->nullable();
            $table->string('gallery_image_four')->nullable();
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
        Schema::dropIfExists('campaign_pages');
    }
}
