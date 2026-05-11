<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPagesTable extends Migration
{
    public function up()
    {
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_primary_button_text')->nullable();
            $table->string('hero_secondary_button_text')->nullable();
            $table->string('hero_feature_icon')->nullable();
            $table->string('hero_feature_title')->nullable();
            $table->text('hero_feature_text')->nullable();
            $table->string('hero_card_one_icon')->nullable();
            $table->string('hero_card_one_title')->nullable();
            $table->string('hero_card_two_icon')->nullable();
            $table->string('hero_card_two_title')->nullable();
            $table->string('hero_card_three_icon')->nullable();
            $table->string('hero_card_three_title')->nullable();
            $table->string('hero_card_four_icon')->nullable();
            $table->string('hero_card_four_title')->nullable();
            $table->string('info_badge')->nullable();
            $table->string('info_title')->nullable();
            $table->text('info_description')->nullable();
            $table->string('form_badge')->nullable();
            $table->string('form_title')->nullable();
            $table->text('form_description')->nullable();
            $table->string('support_badge')->nullable();
            $table->string('support_title')->nullable();
            $table->text('support_description')->nullable();
            $table->string('support_person_title')->nullable();
            $table->string('support_person_subtitle')->nullable();
            $table->string('map_badge')->nullable();
            $table->string('map_title')->nullable();
            $table->text('map_description')->nullable();
            $table->string('map_button_text')->nullable();
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
        Schema::dropIfExists('contact_pages');
    }
}
