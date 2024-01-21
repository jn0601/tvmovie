<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::if('hasrole', function($expression){
            $admin = Auth::user();
            if($admin instanceof \App\Models\Admin) {
                if($admin->hasRole($expression)) {
                    return true;
                }
            }
            return false;
        });
    }
}
