<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/',[GuestController::class,'index'])->name('index');
Route::get('/admin',[GuestController::class,'admin'])->name('admin');
Route::get('/guest-form', [GuestController::class, 'showForm'])->name('guest.form');
Route::post('/guest-form', [GuestController::class, 'store'])->name('guest.store');
