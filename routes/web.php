<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\ViewController@view')->name('welcome');
Route::get('/userList', 'App\Http\Controllers\ViewController@userList')->name('userList');
Route::get('/folderList', 'App\Http\Controllers\ViewController@folderList')->name('folderList');
