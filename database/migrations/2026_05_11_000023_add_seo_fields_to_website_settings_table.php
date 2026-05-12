<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoFieldsToWebsiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('favicon');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->text('meta_keywords')->nullable()->after('meta_description');
            $table->string('meta_author')->nullable()->after('meta_keywords');
            $table->string('canonical_url')->nullable()->after('meta_author');
            $table->string('og_title')->nullable()->after('canonical_url');
            $table->text('og_description')->nullable()->after('og_title');
            $table->string('og_image')->nullable()->after('og_description');
        });
    }

    public function down()
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'meta_description',
                'meta_keywords',
                'meta_author',
                'canonical_url',
                'og_title',
                'og_description',
                'og_image',
            ]);
        });
    }
}
