<?php

use App\Http\Controllers\BorrowController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('borrows',BorrowController::class);
