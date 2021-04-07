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
        'created_at' => now(),
        'updated_at' => now()
      ]);
  }

  //ログイン
  public function signin(Request $request)
  {
    $email = $request->input('email');
    $password = $request->input('password');
    $query = ['email' => $email, 'password' => $password];
    $data = User::where($query)->get();

    if (count($data) > 0) {
      $user = $data[0];
      return ['result' => 'true', 'name' => $user['name'], 'salon' => $user['salon'], 'email' => $user['email']];
    } else {
      return ['result' => 'false'];
    };
  }
}
