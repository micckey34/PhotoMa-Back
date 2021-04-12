<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
  public function test()
  {
    $test = User::where('id', 1)->get();
    return $test[0];
  }

  public function test2()
  {
    $query = ['email' => 'email', 'password' => 'passwordd'];
    $data = User::where($query)->get();
    return $data;
  }


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

  //ユーザーデータ一覧
  public function usersList()
  {
    $users_list = User::select('id', 'name', 'salon')->get();

    return $users_list;
  }

  //ユーザーデータ詳細、公開フォルダ一覧
  //公開フォルダ写真一覧
}
