<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignEventsTable extends Migration
{
    public function up()
    {
        Schema::create('campaign_events', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('status_label')->nullable();
            $table->string('status_class')->nullable();
            $table->string('category')->nullable();
            $table->string('event_date')->nullable();
            $table->string('location')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('gallery_image_one')->nullable();
            $table->string('gallery_image_two')->nullable();
            $table->string('gallery_image_three')->nullable();
            $table->string('gallery_more_count')->nullable();
            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_link')->nullable();
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_link')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaign_events');
    }
}
