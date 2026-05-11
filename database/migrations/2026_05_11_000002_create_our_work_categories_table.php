<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurWorkCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('our_work_categories', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('meta_one_icon')->nullable();
            $table->string('meta_one_text')->nullable();
            $table->string('meta_two_icon')->nullable();
            $table->string('meta_two_text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('our_work_categories');
    }
}
