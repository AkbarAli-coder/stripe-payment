<?php

use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('checkout');


Route::post('/stripe-payment',[StripePaymentController::class,'stripPaymet'])->name('stripe.payment');
Route::get('/stripe-success',[StripePaymentController::class,'stripeSuccess'])->name('stipe.success');
Route::get('/stripe-cancel',[StripePaymentController::class,'stripeCancel'])->name('stipe.cancel');
Route::get('/stripe-error',[StripePaymentController::class,'stripeError'])->name('stipe.error');