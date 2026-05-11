<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('donate_pages', function (Blueprint $table) {
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
            $table->string('why_badge')->nullable();
            $table->string('why_title')->nullable();
            $table->text('why_description')->nullable();
            $table->string('form_badge')->nullable();
            $table->string('form_title')->nullable();
            $table->text('form_description')->nullable();
            $table->text('quick_amounts')->nullable();
            $table->text('payment_modes')->nullable();
            $table->text('donation_purposes')->nullable();
            $table->string('form_button_text')->nullable();
            $table->string('form_success_message')->nullable();
            $table->string('payment_badge')->nullable();
            $table->string('payment_title')->nullable();
            $table->text('payment_description')->nullable();
            $table->string('qr_image')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc_upi')->nullable();
            $table->string('tax_badge')->nullable();
            $table->string('tax_title')->nullable();
            $table->text('tax_description')->nullable();
            $table->string('tax_point_one')->nullable();
            $table->string('tax_point_two')->nullable();
            $table->string('support_badge')->nullable();
            $table->string('support_title')->nullable();
            $table->text('support_description')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('support_email')->nullable();
            $table->string('cta_badge')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_primary_button_text')->nullable();
            $table->string('cta_secondary_button_text')->nullable();
            $table->string('cta_secondary_button_link')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donate_pages');
    }
}
