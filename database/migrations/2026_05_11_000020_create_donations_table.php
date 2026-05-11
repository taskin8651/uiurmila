<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('quick_amount')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('donation_purpose')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
