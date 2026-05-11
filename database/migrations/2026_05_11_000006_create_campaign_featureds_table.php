<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignFeaturedsTable extends Migration
{
    public function up()
    {
        Schema::create('campaign_featureds', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('status_label')->nullable();
            $table->string('badge')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('event_date')->nullable();
            $table->string('location')->nullable();
            $table->string('audience')->nullable();
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
        Schema::dropIfExists('campaign_featureds');
    }
}
