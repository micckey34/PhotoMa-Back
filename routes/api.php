<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//テスト
Route::get('/test', 'App\Http\Controllers\UserController@test');
Route::get('/test2', 'App\Http\Controllers\UserController@test2');

//ユーザー登録
Route::post('/create', 'App\Http\Controllers\UserController@create');
//ログイン
Route::post('/signin', 'App\Http\Controllers\UserController@signin');

//フォルダ読み込み
Route::get('/folder/{id}', 'App\Http\Controllers\FolderController@folder');
//フォルダ作成
Route::post('/createFolder', 'App\Http\Controllers\FolderController@create');

//グループ作成
Route::post('/createGroup', 'App\Http\Controllers\GroupController@create');
