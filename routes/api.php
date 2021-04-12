<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//テスト
Route::get('/test', 'App\Http\Controllers\UserController@test');
Route::get('/test2', 'App\Http\Controllers\UserController@test2');

//ユーザー登録
Route::post('/signUp', 'App\Http\Controllers\UserController@create');
//ログイン
Route::post('/signIn', 'App\Http\Controllers\UserController@signIn');
//ユーザーデータ取得
Route::get('/myData/{id}', 'App\Http\Controllers\UserController@myData');
//ユーザーデータ変更
Route::post('/update', 'App\Http\Controllers\UserController@update');


//フォルダ一覧表示
Route::get('/folderList/{id}', 'App\Http\Controllers\FolderController@folderList');
//フォルダ作成
Route::post('/createFolder', 'App\Http\Controllers\FolderController@create');
//写真一覧表示
//写真アップロード
//写真詳細表示
//写真メモ作成


//グループ一覧表示
Route::get('/groupList/{id}', 'App\Http\Controllers\GroupController@groupList');
//グループ作成
Route::post('/createGroup', 'App\Http\Controllers\GroupController@create');
//グループ検索
Route::post('/searchGroup', 'App\Http\Controllers\GroupController@search');
//グループ加入
Route::post('/joinGroup', 'App\Http\Controllers\GroupController@join');
//グループチャット
//グループ情報編集


//ユーザーデータ一覧
Route::get('/usersList', 'App\Http\Controllers\UserController@usersList');
//ユーザーデータ詳細、公開フォルダ一覧
//公開フォルダ写真一覧
