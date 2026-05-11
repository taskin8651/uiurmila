<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurWorkDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('our_work_details', function (Blueprint $table) {
            $table->id();
            $table->string('section_id')->nullable();
            $table->string('image')->nullable();
            $table->string('label')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('beneficiaries_label')->nullable();
            $table->string('beneficiaries_text')->nullable();
            $table->string('impact_label')->nullable();
            $table->string('impact_text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->boolean('is_reverse')->default(0);
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('our_work_details');
    }
}
