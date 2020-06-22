<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SMS;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
	    $this->app->singleton(SMS::class, function ($app) {
		    return new SMS(env('SMS_SID'),env('SMS_TOKEN'));
	    });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		//
    }
}
