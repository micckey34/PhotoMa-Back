<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Folder;

class UserController extends Controller
{

  //ユーザー登録
  public function create(Request $request)
  {
    $name = $request->input('name');
    $salon = $request->input('salon');
    $email = $request->input('email');
    $password = $request->input('password');

    return
      User::create([
        'id' => null,
        'name' => $name,
        'salon' => $salon,
        'email' => $email,
        'password' => sha1($password),
        'profile_image_path' => null,
        'created_at' => now(),
        'updated_at' => now()
      ]);
  }

  //ログイン
  public function signIn(Request $request)
  {
    $email = $request->input('email');
    $password = $request->input('password');
    $query = ['email' => $email, 'password' => sha1($password)];
    $data = User::where($query)->get();

    if (count($data) > 0) {
      $user = $data[0];
      return ['result' => 'true', 'id' => $user['id'],];
    } else {
      return ['result' => 'false'];
    };
  }

  //ユーザーデータ取得
  public function myData($id)
  {
    $data = User::where('id', $id)->get();
    return $data[0];
  }


  //ユーザーデータ変更
  public function update(Request $request)
  {
    $type = $request->input('type');
    $id = $request->input('id');
    $value = $request->input('value');
    if ($type == 'name') {
      return
        User::where('id', $id)->update(['name' => $value]);
    } else if ($type == 'salon') {
      return
        User::where('id', $id)->update(['salon' => $value]);
    } else if ($type == 'email') {
      return
        User::where('id', $id)->update(['email' => $value]);
    }
  }

  public function profileImg(Request $request)
  {
    $profile_image_path = $request->input('profile_image_path');
    $user_id = $request->input('user_id');

    return User::where('id', $user_id)->update(['profile_image_path' => $profile_image_path]);
  }

  //ユーザーデータ一覧
  public function usersList()
  {
    $users_list = User::select('id', 'name', 'salon', 'profile_image_path')->with(['folders' => function ($query) {
      $query->where('look', 0);
    }])->get();

    return $users_list;
  }

  //ユーザーデータ詳細、公開フォルダ一覧
  public function userData($id)
  {
    $data = User::select('id', 'name', 'salon', 'profile_image_path')->where('id', $id)->get();
    return $data[0];
  }
  public function folderData($id)
  {
    $query = ['user_id' => $id, 'look' => false];
    $data = Folder::select('id', 'folder_name')->where($query)->get();
    return $data;
  }
}
