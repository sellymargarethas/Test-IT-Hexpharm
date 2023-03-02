<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login',[App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::get('/logout',[App\Http\Controllers\Auth\LogoutController::class, 'index'])->name('logout');
Route::post('/login_proses',[App\Http\Controllers\Auth\LoginController::class, 'check'])->name('login_proses');


/*ADMIN*/
Route::get('/admin',[App\Http\Controllers\Auth\AdminController::class, 'index'])->name('admin');
Route::post('/add_produk',[App\Http\Controllers\Auth\AdminController::class, 'add_produk'])->name('add_produk');
Route::post('/delete_produk',[App\Http\Controllers\Auth\AdminController::class, 'delete_produk'])->name('delete_produk');
Route::post('/edit_produk',[App\Http\Controllers\Auth\AdminController::class, 'edit_produk'])->name('edit_produk');

Route::get('/produk',[App\Http\Controllers\Auth\AdminController::class, 'produk'])->name('produk');
Route::post('/add_produk',[App\Http\Controllers\Auth\AdminController::class, 'add_produk'])->name('add_produk');
Route::post('/delete_produk',[App\Http\Controllers\Auth\AdminController::class, 'delete_produk'])->name('delete_produk');
Route::post('/edit_produk',[App\Http\Controllers\Auth\AdminController::class, 'edit_produk'])->name('edit_produk');

Route::get('/diskon_h',[App\Http\Controllers\Auth\AdminController::class, 'diskon_h'])->name('diskon_h');
Route::post('/add_diskon_h',[App\Http\Controllers\Auth\AdminController::class, 'add_diskon_h'])->name('add_diskon_h');
Route::post('/delete_diskon_h',[App\Http\Controllers\Auth\AdminController::class, 'delete_diskon_h'])->name('delete_diskon_h');
Route::post('/edit_diskon_h',[App\Http\Controllers\Auth\AdminController::class, 'edit_diskon_h'])->name('edit_diskon_h');

Route::get('/order_h',[App\Http\Controllers\Auth\AdminController::class, 'order_h'])->name('order_h');
Route::post('/add_order_h',[App\Http\Controllers\Auth\AdminController::class, 'add_order_h'])->name('add_order_h');
Route::post('/delete_order_h',[App\Http\Controllers\Auth\AdminController::class, 'delete_order_h'])->name('delete_order_h');
Route::post('/edit_order_h',[App\Http\Controllers\Auth\AdminController::class, 'edit_order_h'])->name('edit_order_h');
    

Route::get('/diskon_d',[App\Http\Controllers\Auth\AdminController::class, 'diskon_d'])->name('diskon_d');
Route::post('/add_diskon_d',[App\Http\Controllers\Auth\AdminController::class, 'add_diskon_d'])->name('add_diskon_d');
Route::post('/delete_diskon_d',[App\Http\Controllers\Auth\AdminController::class, 'delete_diskon_d'])->name('delete_diskon_d');
Route::post('/edit_diskon_d',[App\Http\Controllers\Auth\AdminController::class, 'edit_diskon_d'])->name('edit_diskon_d');
    

Route::get('/order_d',[App\Http\Controllers\Auth\AdminController::class, 'order_d'])->name('order_d');
Route::post('/add_order_d',[App\Http\Controllers\Auth\AdminController::class, 'add_order_d'])->name('add_order_d');
Route::post('/delete_order_d',[App\Http\Controllers\Auth\AdminController::class, 'delete_order_d'])->name('delete_order_d');
Route::post('/edit_order_d',[App\Http\Controllers\Auth\AdminController::class, 'edit_order_d'])->name('edit_order_d');

Route::get('/outlet',[App\Http\Controllers\Auth\AdminController::class, 'outlet'])->name('outlet');
Route::post('/add_outlet',[App\Http\Controllers\Auth\AdminController::class, 'add_outlet'])->name('add_outlet');
Route::post('/delete_outlet',[App\Http\Controllers\Auth\AdminController::class, 'delete_outlet'])->name('delete_outlet');
Route::post('/edit_outlet',[App\Http\Controllers\Auth\AdminController::class, 'edit_outlet'])->name('edit_outlet');

Route::get('/ujian',[App\Http\Controllers\Auth\AdminController::class, 'ujian'])->name('ujian');
Route::post('/add_ujian',[App\Http\Controllers\Auth\AdminController::class, 'add_ujian'])->name('add_ujian');
Route::post('/delete_ujian',[App\Http\Controllers\Auth\AdminController::class, 'delete_ujian'])->name('delete_ujian');
Route::post('/edit_ujian',[App\Http\Controllers\Auth\AdminController::class, 'edit_ujian'])->name('edit_ujian');


