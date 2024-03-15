<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRController;

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
});

Auth::routes();

Route::get('/qrscan', function () {
    return view('qrscan');
});

// Route::get('/product', function() {
//     return view('product');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product', [App\Http\Controllers\QRController::class, 'showProduct'])->name('product');
Route::get('/createData', [App\Http\Controllers\QRController::class, 'createData'])->name('createData');
