<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;

//General
Auth::routes();
Route::get('/home', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs']);
Route::get('/empresas', [HomeController::class, 'homeEmpresa']);
Route::get('/reset-banner-cookie', [HomeController::class, 'saveBannerCookie']);
Route::get('/hack4good', [HomeController::class, 'hack4good']);

//Product
Route::get('/product', [ProductController::class, 'showProduct'])->name('product');
Route::get('/createproduct', [ProductController::class, 'createProductView'])->name('createproduct');
Route::post('/createproductaction', [ProductController::class, 'createProduct'])->name('createproductaction');

//Qr
Route::get('/viewqr', [QRController::class, 'viewQr'])->name('viewqr');
Route::post('/scan-qr', [QRController::class, 'scanQR'])->name('scan.qr');
Route::get('/viewqrs', [QRController::class, 'viewQrs'])->name('viewqrs');
Route::post('/createqr', [QRController::class, 'createQr'])->name('createqr');
Route::get('/buscar-qr', [QrController::class, 'buscar'])->name('buscar.qr');
Route::get('/qrscan', function () {    return view('qrscan'); });

//Nodes 
Route::get('/addnode', [NodeController::class, 'addNode'])->name('addnode');
Route::get('/endnode', [NodeController::class, 'endNode'])->name('endNode');
Route::get('/nodecreated', [NodeController::class, 'nodeCreated'])->name('nodecreated');
Route::get('/pathended', [NodeController::class, 'pathended'])->name('pathended');

//Test
Route::get('/test', [TestController::class, 'alexTest'])->name('alexTest');
Route::post('/form_alex', [TestController::class, 'alexTest2'])->name('form_alex');

//Usuarios
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});