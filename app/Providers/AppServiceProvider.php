<?php

namespace App\Providers;

use Dotenv\Dotenv;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        (new \Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
//            dirname(__DIR__.'/../../'), '.env-old.'.$this->app->environment()
//        ))->bootstrap();
//        print($this->app->environment());

//        $dotenv = Dotenv::createImmutable(__DIR__.'/../../', '.env-old.'.$this->app->environment());
//        $dotenv->safeLoad();
//        Dotenv::create(base_path(), '.env-old.' . $this->app->environment())->overload();

        //...
    }
}
