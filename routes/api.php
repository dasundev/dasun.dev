<?php

use App\Http\Controllers\Api\LicenseController;
use App\Http\Controllers\Api\SatisAuthenticationController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('api')->post('license', [LicenseController::class, 'store']);

Route::middleware('auth:license-api')->post('/satis/authenticate', SatisAuthenticationController::class);
