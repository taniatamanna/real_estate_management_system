<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\UserFeedbackController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth.check','auth.admin'])->group(function () {
//user
Route::get('get-users',[UserController::class,'index'])->name('users');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'] )->name('user.store');



});

Route::middleware(['auth.check'])->group(function () {
//Property
Route::get('properties', [PropertyController::class, 'index'])->name('show-property');
Route::get('add-properties', [PropertyController::class, 'create'])->name('add-property');
Route::delete('/property/delete/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');
Route::get('/property/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
Route::put('/property/update/{id}', [PropertyController::class, 'update'])->name('property.update');


//Order
Route::get('/get-transaction',[TransactionController::class,'index'])->name('get.transaction');
Route::get('/get-order',[OrderController::class,'index'])->name('get.order');

//feedback
Route::get('/get-feedback',[UserFeedbackController::class,'index'])->name('get.feedback');
Route::get('/get-feedback-individual-property/{propertyId}',[UserFeedbackController::class,'feedbackIndividualProperty'])->name('get.feedback.individual.property');

});


