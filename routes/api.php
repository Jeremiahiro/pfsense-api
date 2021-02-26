<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::name('v1.')
    ->prefix('v1')
    ->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        /**authenticated users actions starts here */
        Route::name('user')->group(function () {
        /*::middleware(['auth:api'])->*/
            Route::post('/logout', [AuthController::class, 'logout'])->name('post.logout');
            Route::post('/refresh', [AuthController::class, 'refreshToken'])->name('post.refresh');
        });
});

