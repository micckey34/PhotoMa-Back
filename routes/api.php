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
Route::post('/profileImg', 'App\Http\Controllers\UserController@profileImg');


//フォルダ一覧表示
Route::get('/folderList/{id}', 'App\Http\Controllers\FolderController@folderList');
//フォルダ作成
Route::post('/createFolder', 'App\Http\Controllers\FolderController@create');
//写真一覧表示
Route::get('/photoList/{id}', 'App\Http\Controllers\FolderController@photoList');
//写真アップロード
Route::post('/imgUpload', 'App\Http\Controllers\FolderController@imgUpload');
//写真詳細表示
Route::get('/photoPage/{id}', 'App\Http\Controllers\FolderController@photoPage');
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
Route::get('/groupPage/{id}', 'App\Http\Controllers\GroupController@groupPage');
Route::get('/uniqueId/{id}', 'App\Http\Controllers\GroupController@uniqueId');
Route::post('/groupPost', 'App\Http\Controllers\GroupController@post');
Route::post('/groupPostFolder', 'App\Http\Controllers\GroupController@postFolder');
//グループ情報編集


//ユーザーデータ一覧
Route::get('/usersList', 'App\Http\Controllers\UserController@usersList');
//ユーザーデータ詳細、公開フォルダ一覧
Route::get('/userData/{id}', 'App\Http\Controllers\UserController@userData');
Route::get('/folderData/{id}', 'App\Http\Controllers\UserController@folderData');
//公開フォルダ写真一覧
