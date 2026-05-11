<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('category')->nullable();
            $table->string('published_date')->nullable();
            $table->string('author')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->text('lead_paragraph')->nullable();
            $table->longText('content')->nullable();
            $table->string('highlight_icon')->nullable();
            $table->string('highlight_title')->nullable();
            $table->text('highlight_text')->nullable();
            $table->text('quote')->nullable();
            $table->text('tags')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() { Schema::dropIfExists('blogs'); }
}
