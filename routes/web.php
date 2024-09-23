<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;

Route::get('/', [LabController::class, 'welcome']);
Route::get('/lab1', [LabController::class, 'index']);
Route::get('/about', [LabController::class, 'about']);
Route::get('/contact', [LabController::class, 'contact']);

Route::get('/about', [LabController::class, 'about']);//->middleware('check.age');
Route::get('/hobbies', [LabController::class, 'hobbies']);//->middleware('check.name');