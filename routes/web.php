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
    return view('home');
});

Route::get('/empresas', function () {
    return view('home_empresa');
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
Route::get('/viewqr', [App\Http\Controllers\QRController::class, 'viewQr'])->name('viewqr');
Route::post('/scan-qr', [App\Http\Controllers\QRController::class, 'scanQR'])->name('scan.qr');
// Route::get('/createData', [App\Http\Controllers\QRController::class, 'createData'])->name('createData');
Route::get('/createqr', [App\Http\Controllers\QRController::class, 'createQr'])->name('createqr');
Route::get('/createproduct', [App\Http\Controllers\QRController::class, 'createProductView'])->name('createproduct');
Route::post('/createproductaction', [App\Http\Controllers\QRController::class, 'createProduct'])->name('createproductaction');
Route::get('/addnode', [App\Http\Controllers\QRController::class, 'addNode'])->name('addnode');
Route::get('/nodecreated', [App\Http\Controllers\QRController::class, 'nodeCreated'])->name('nodecreated');
Route::get('/buscar-qr', [QrController::class, 'buscar'])->name('buscar.qr');
