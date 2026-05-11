<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $websiteSetting = null;

        if (Schema::hasTable('website_settings')) {
            $websiteSetting = WebsiteSetting::where('status', 1)->latest()->first();
        }

        View::share('globalWebsiteSetting', $websiteSetting);
    }
}
