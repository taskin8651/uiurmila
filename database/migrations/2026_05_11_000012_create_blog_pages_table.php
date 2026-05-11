<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPagesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_pages', function (Blueprint $table) {
            $table->id();
            $table->text('hero_badge')->nullable();
            $table->text('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_primary_button_text')->nullable();
            $table->string('hero_primary_button_link')->nullable();
            $table->string('hero_secondary_button_text')->nullable();
            $table->string('hero_secondary_button_link')->nullable();
            $table->string('hero_feature_icon')->nullable();
            $table->string('hero_feature_title')->nullable();
            $table->text('hero_feature_text')->nullable();
            $table->string('hero_topic_one_icon')->nullable();
            $table->string('hero_topic_one_title')->nullable();
            $table->string('hero_topic_two_icon')->nullable();
            $table->string('hero_topic_two_title')->nullable();
            $table->string('hero_topic_three_icon')->nullable();
            $table->string('hero_topic_three_title')->nullable();
            $table->string('hero_topic_four_icon')->nullable();
            $table->string('hero_topic_four_title')->nullable();
            $table->string('featured_badge')->nullable();
            $table->string('list_badge')->nullable();
            $table->string('list_title')->nullable();
            $table->text('list_description')->nullable();
            $table->string('filter_one')->nullable();
            $table->string('filter_two')->nullable();
            $table->string('filter_three')->nullable();
            $table->string('filter_four')->nullable();
            $table->string('filter_five')->nullable();
            $table->string('filter_six')->nullable();
            $table->string('topics_badge')->nullable();
            $table->string('topics_title')->nullable();
            $table->text('topics_description')->nullable();
            $table->string('newsletter_badge')->nullable();
            $table->string('newsletter_title')->nullable();
            $table->text('newsletter_description')->nullable();
            $table->string('newsletter_placeholder')->nullable();
            $table->string('newsletter_button_text')->nullable();
            $table->string('detail_author_name')->nullable();
            $table->text('detail_author_description')->nullable();
            $table->string('detail_share_title')->nullable();
            $table->string('detail_categories_title')->nullable();
            $table->string('detail_donate_badge')->nullable();
            $table->string('detail_donate_title')->nullable();
            $table->text('detail_donate_description')->nullable();
            $table->string('detail_donate_button_text')->nullable();
            $table->string('detail_donate_button_link')->nullable();
            $table->string('related_badge')->nullable();
            $table->string('related_title')->nullable();
            $table->text('related_description')->nullable();
            $table->string('detail_cta_badge')->nullable();
            $table->string('detail_cta_title')->nullable();
            $table->text('detail_cta_description')->nullable();
            $table->string('detail_cta_primary_button_text')->nullable();
            $table->string('detail_cta_primary_button_link')->nullable();
            $table->string('detail_cta_secondary_button_text')->nullable();
            $table->string('detail_cta_secondary_button_link')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() { Schema::dropIfExists('blog_pages'); }
}
