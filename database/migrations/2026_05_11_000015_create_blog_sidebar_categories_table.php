<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogSidebarCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_sidebar_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('count')->nullable();
            $table->string('link')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() { Schema::dropIfExists('blog_sidebar_categories'); }
}
