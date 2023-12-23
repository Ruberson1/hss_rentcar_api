<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\DeletedUserController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserController::class, 'register'])
    ->middleware('guest')
    ->name('register');

Route::put('/{id}', [RegisteredUserController::class, 'update'])
    ->middleware('guest')
    ->name('update');

Route::get('/user-list', [RegisteredUserController::class, 'getAll'])
    ->middleware('guest')
    ->name('getAll');

Route::delete('/delete/{id}', [DeletedUserController::class, 'delete'])
    ->middleware('guest')
    ->name('delete');

Route::post('/login', [AuthenticatedSessionController::class, 'login'])
                ->middleware('guest')
                ->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'resetPass'])
                ->middleware('guest')
                ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'newPass'])
                ->middleware('guest')
                ->name('password.store');


