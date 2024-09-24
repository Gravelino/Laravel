<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PaymentController;


Route::get('/', [LabController::class, 'welcome']);
Route::get('/lab1', [LabController::class, 'index']);

Route::get('/about', [LabController::class, 'about']);//->middleware('check.age');
Route::get('/hobbies', [LabController::class, 'hobbies']);//->middleware('check.name');

Route::resource('users', UserController::class);
Route::resource('cars', CarController::class);
Route::resource('feedbacks', FeedbackController::class);
Route::resource('rentals', RentalController::class);
Route::resource('payments', PaymentController::class);