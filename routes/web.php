<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//socialite routes
route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

route::middleware(['auth'])->group(function() {
    //checkoute route
    Route::get('checkout/success}', [CheckoutController::class, 'success'])-> name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])-> name('checkout.create');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])-> name('checkout.store');
    //user dashboard
    route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
