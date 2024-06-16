<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarketPriceController;
use App\Http\Controllers\InformasiTanamanController;
use App\Http\Controllers\WeatherController;



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
    Route::get('marketprices', [MarketPriceController::class, 'index']);
    Route::get('marketprices/{id}', [MarketPriceController::class, 'show']);
    Route::get('tanamans', [InformasiTanamanController::class, 'index']);
    Route::get('tanamans/{id}', [InformasiTanamanController::class, 'show']);
    Route::get('/weather/{location}', [WeatherController::class, 'fetchWeather']);

});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
