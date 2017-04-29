<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (class_exists(\ErpNET\Mailsend\Providers\ErpnetMailsendServiceProvider::class))
            $this->app->register(\ErpNET\Mailsend\Providers\ErpnetMailsendServiceProvider::class);
    }
}
