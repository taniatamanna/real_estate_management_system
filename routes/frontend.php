<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserFeedbackController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/property/view/{id}', [HomeController::class, 'propertyView'])->name('propertyView');
Route::get('/property/purchase/{id}', [HomeController::class, 'propertyPurchase'])->name('propertyPurchase');
Route::post('/property/purchase/store/{id}', [HomeController::class, 'propertyPurchaseStore'])->name('property.purchase.store');
Route::post('/sell-property-store', [HomeController::class, 'store'])->name('sell.property.store');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');


Route::post('/user-property-feedback/{propertyId}', [UserFeedbackController::class, 'userPropertyFeedback'])->name('user.property.feedback');


