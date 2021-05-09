<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view()
    {
        $users = User::select('id', 'name', 'salon', 'profile_image_path')->with(['folders' => function ($query) {
            $query->where('look', 0);
        }])->inrandomorder()->limit(5)->get();

        $folders = Folder::select('id', 'folder_name')->where('look', 0)->with(['images' => function ($query) {
            $query->Limit(1);
        }])->limit(5)->get();

        return view('welcome')->with(['users' => $users, 'folders' => $folders]);
    }

    public function userList()
    {
        $users = User::select('id', 'name', 'salon', 'profile_image_path')->with(['folders' => function ($query) {
            $query->where('look', 0)->limit(3);
        }])->inrandomorder()->get();
        return view('userList')->with(['users' => $users]);
    }
}
