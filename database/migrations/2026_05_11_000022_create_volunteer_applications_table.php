<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('volunteer_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('area_of_interest')->nullable();
            $table->string('availability')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('volunteer_applications');
    }
}
