<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BidController;


// Authentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

// Public item routes
Route::get('/items', [ItemController::class, 'index']);
//Route::get('/my-bids', [BidController::class, 'myBids']);

//Route::get('/items/{id}', [ItemController::class, 'show']);
//Route::get('/items', [CarrierDashboardController::class, 'index']);

//Route::post('/items', [ItemController::class, 'store']);
//Route::put('/items/{id}', [ItemController::class, 'update']);
//Route::delete('/items/{id}', [ItemController::class, 'destroy']);

// Protected routes
Route::middleware('auth:api')->group(function () {
    Route::get('/users', function (Request $request) {
        return $request->user();
    });

    // Add other protected routes here if needed
});
