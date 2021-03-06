<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Name of the field that specifies the owner. It should be the same for all models.
     */
    public const OWNER_FIELD = 'owner_id';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::directive('errorClass', function ($field) {
            $ifStatement = "if(session()->has('errors') && session('errors')->has(${field}))";

            return "<?php {$ifStatement} echo 'is-invalid'; ?>";
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);        
    }
}
