<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingApiController;

// Thêm prefix "api" để dễ test trên Postman
Route::prefix('api')->group(function () {
    Route::get('/ping', function () {
        return response()->json(['message' => 'API is working!']);
    });

    Route::get('/bookings', [BookingApiController::class, 'apiIndex']);
    Route::post('/bookings', [BookingApiController::class, 'apiStore']);
});
