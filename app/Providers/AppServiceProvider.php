<?php

namespace App\Providers;

//contracs
use App\Contracts\EjercicioServiceInterface;
use App\Contracts\ProfileServiceInterface;
use App\Contracts\RutinaServiceInterface;
use App\Contracts\SeguimientoServiceInterface;
use App\Contracts\UserServiceInterface;

//Services

use App\Services\EjercicioService;
use App\Services\ProfileService;
use App\Services\RutinaService;
use App\Services\SeguimientoService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
 
        $this->app->bind(EjercicioServiceInterface::class, EjercicioService::class);
        $this->app->bind(ProfileServiceInterface::class, ProfileService::class);
        $this->app->bind(RutinaServiceInterface::class, RutinaService::class);
        $this->app->bind(UserserviceInterface::class, UserService::class);
        $this->app->bind(SeguimientoServiceInterface::class, SeguimientoService::class);
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
