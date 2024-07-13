<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CarrierDashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BidController;


Route::get('/carrier-dashboard', [CarrierDashboardController::class, 'index']);
Route::post('/submit-bid', [CarrierDashboardController::class, 'submitBid'])->name('submit.bid');

// Public routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Routes below are better suited for api.php and should be removed from web.php
// Route::post('/items', [ItemController::class, 'store']);
Route::get('/items', [ItemController::class, 'index']);
Route::get('/vehicles', [ItemController::class, 'getVehicles']);
Route::post('/filterByVehicleType', [ItemController::class, 'filterByVehicleType']);
Route::post('/submit-bid', [ItemController::class, 'submitBid'])->name('submit.bid');

// Route::get('/items/{id}', [ItemController::class, 'show']);

//Route::get('/api/items', [ItemController::class, 'getItems']);


Route::get('/check-database', function () {
    $items = DB::table('items')->get();
    return view('check-database', ['items' => $items]);
});

//Getting Bids
Route::get('/bids', [BidController::class, 'index']);
Route::get('/my-bids', [BidController::class, 'myBids']);

// Route for updating a bid (PUT request)
Route::put('/bids/{id}', [BidController::class, 'update'])->name('bids.update');

// Route for deleting a bid (DELETE request)
Route::delete('/bids/{id}', [BidController::class, 'destroy'])->name('bids.destroy');

//Get Lowest Bid
Route::get('/lowest-bids', [BidController::class, 'lowestBids']);



// Catch-all route to handle frontend routing
Route::get('/{pathMatch}', function () {
    return view('welcome');
})->where('pathMatch', ".*");
