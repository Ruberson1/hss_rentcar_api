<?php

namespace App\Providers;

use App\Http\Interfaces\Repositories\IRegisterUserRepository;
use App\Http\Interfaces\Services\Auth\IAuthenticatedSessionService;
use App\Http\Interfaces\Services\Auth\INewPasswordService;
use App\Http\Interfaces\Services\Auth\IPasswordResetLinkService;
use App\Http\Interfaces\Services\Auth\IRegisterUserService;
use App\Http\Repositories\Auth\RegisterUserRepository;
use App\Http\Services\Auth\AuthenticatedSessionService;
use App\Http\Services\Auth\NewPasswordService;
use App\Http\Services\Auth\PasswordResetLinkService;
use App\Http\Services\Auth\RegisterUserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Services
        $this->app->bind(IAuthenticatedSessionService::class, AuthenticatedSessionService::class);
        $this->app->bind(INewPasswordService::class, NewPasswordService::class);
        $this->app->bind(IPasswordResetLinkService::class, PasswordResetLinkService::class);
        $this->app->bind(IRegisterUserService::class, RegisterUserService::class);

        //Repositories
        $this->app->bind(IRegisterUserRepository::class, RegisterUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
