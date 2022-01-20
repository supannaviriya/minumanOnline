<?php

use App\Http\Controllers\dataController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\mainController;

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

//home awal tanpa login
Route::get('/home', function () {
    return view('home');
});

//register untuk admin dan user
Route::get('/register', [mainController::class, 'register'])->middleware('guest');

//redirect ke page admin
Route::get('/admin_page.home_admin',[mainController::class,'home_admin'])->middleware('auth');


//login untuk admin dan user
Route::get('/login', [mainController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [mainController::class, 'login_page']);


//logout untuk admin dan user
Route::post('/logout', [mainController::class, 'logout']);

//nyimpen data untuk admin dan user
Route::post('/register', [mainController::class, 'store']);

Route::get('/menu_user',[mainController::class,'menu_user'])->middleware('auth');

//admin_page
Route::get('admin_page.delete_minum/{id}',[mainController::class,'delete_minum']);
Route::get('/admin_page.list_minuman',[mainController::class,'list_minuman']);
Route::put('/admin_page.list_minuman',[mainController::class,'update_minuman']);
Route::post('/admin_page.list_minuman',[mainController::class,'list_minuman']);

Route::post('/admin_page.tambah_minum', [mainController::class, 'add_minum']);
Route::get('/admin_page.tambah_minum',[mainController::class, 'tambah_minum']);

Route::get('/admin_page.list_minuman', [mainController::class,'read_data']);

Route::get('/admin_page.edit_minum/{id}', [mainController::class,'show_minum']);
Route::post('/admin_page.edit_minum', [mainController::class, 'update_minum']);

Route::get('/admin_page.home_admin',[mainController::class,'home_admin'])->name('admin_page.home_admin')->middleware('Authlevel');


//pembayaran
Route::get('/pembayaran.beli_minum/{id}',[mainController::class, 'beli_minuman']);
Route::post('/pembayaran.beli_minum/{id}',[mainController::class, 'beli_minum']);
Route::get('/pembayaran.pesanan_minum',[mainController::class, 'pesanan_minum']);
Route::delete('pembayaran.pesanan_minum/{id}',[mainController::class, 'delete_trans']);



Route::get('konfirmasi',[mainController::class,'konfirmasi_trans']);


//user_page
Route::get('/user_page.histori_trans',[mainController::class, 'histori']);
Route::get('/user_page.histori_trans/{id}',[mainController::class, 'detail']);
Route::get('/user_page.daftar_minum', [mainController::class,'daftar_minum']);
Route::get('/user_page.home_user',[mainController::class,'home_user'])->middleware('auth');


