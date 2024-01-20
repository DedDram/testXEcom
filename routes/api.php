<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1',], function () {
    Route::post('/course', [ApiController::class, 'calculateExchangeRate']);
});
