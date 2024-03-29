<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;


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

Route::prefix('v1')->middleware(['cors'])->group(function () {
    Route::get('/search/{paramSearch}', [ClientController::class, 'search'])
        ->name('search');
    Route::get('/show/{videoId}', [ClientController::class, 'showDetailVideo'])
        ->name('showVideo');
});
