<?php

use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Reservation\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('car')->group(function () {
    Route::get('/list', [CarController::class, 'getAll']);
    Route::post('/register', [CarController::class, 'register']);
    Route::get('/available', [CarController::class, 'available']);
    Route::get('/{id}', [CarController::class, 'getOneById']);
    Route::put('/{id}', [CarController::class, 'update']);
    Route::patch('/{id}', [CarController::class, 'reserved']);
    Route::delete('/{id}', [CarController::class, 'delete']);
});

Route::prefix('reservation')->group(function () {
    Route::get('/list', [ReservationController::class, 'getAll']);
    Route::post('/register', [ReservationController::class, 'register']);
    Route::get('/car-reservation/{car_id}', [ReservationController::class, 'getByCar']);
    Route::get('/user-reservation/{user_id}', [ReservationController::class, 'getByUser']);
    Route::put('/{id}', [ReservationController::class, 'update']);
    Route::patch('/{id}', [ReservationController::class, 'canceled']);
});

Route::prefix('categories')->group(function () {
    Route::get('/list', [CategoryController::class, 'getAll']);
});
