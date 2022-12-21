<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ReportController;
use Spatie\Activitylog\ActivityLogger;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// User
Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

// Books
Route::resource('books', \App\Http\Controllers\BookController::class)
    ->middleware('auth');

// Route Untuk Meminjam
Route::get('/borrows', '\App\Http\Controllers\LendController@index')->name('getIndexBorrows')->middleware('auth');
Route::post('/borrows/validate', '\App\Http\Controllers\LendController@checkValidate')->name('validateMahasiswa')->middleware('auth');
Route::get('/borrows/lendbooks', '\App\Http\Controllers\LendController@lendBooksIndex')->name('getLendBooks')->middleware('auth');
Route::put('/borrows/lendbooks/{id}', '\App\Http\Controllers\LendController@insertLend')->name('setLend')->middleware('auth');

// Route untuk Mengembalikan
Route::get('/return', '\App\Http\Controllers\ReturnController@index')->name('getIndexPengembalian')->middleware('auth');
Route::post('/return/validate','\App\Http\Controllers\ReturnController@checkValidate')->name('validate')->middleware('auth');
Route::get('/return/peminjam', '\App\Http\Controllers\ReturnController@getDataPeminjam')->name('getDataPeminjam')->middleware('auth');
Route::put('/return/peminjam/{ID_Transaksi}','\App\Http\Controllers\ReturnController@pengembalian')->name('setPengembalian')->middleware('auth');

// Route Untuk Melihat data Transaksi
Route::get('/transaksi', '\App\Http\Controllers\TransaksiController@index')->name('getTransaksi')->middleware('auth');

// Route untuk print data Transaksi
Route::get('/report', ReportController::class)->name('getTransaksiPrint')->middleware('auth');

// Route Queue
// Route::get('/send-emails', '\App\Http\Controllers\TestQueueEmails@sendTestEmails')->name('sendQueue');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');