<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FolderController extends Controller
{
    //フォルダ一覧表示
    public function folderList($id)
    {
        $folders = Folder::select('id', 'folder_name')->where('user_id', $id)->get();
        return $folders;
    }

    //フォルダ作成
    public function create(Request $request)
    {
        $folder_name = $request->input('folder_name');
        $user_id = $request->input('user_id');
        $look = $request->input('look');

        return
            Folder::insert([
                'id' => null,
                'folder_name' => $folder_name,
                'user_id' => $user_id,
                'look' => $look,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }

    //写真一覧表示
    public function photoList($id)
    {
        $data = Image::select('id', 'image_path')->where('folder_id', $id)->orderBy('created_at', 'desc')->get();
        return $data;
    }

    //写真アップロード
    public function imgUpload(Request $request)
    {
        $image_path = $request->input('image_path');
        $user_id = $request->input('user_id');
        $folder_id = $request->input('folder_id');

        Image::insert([
            // 'id'=> null,
            'image_path' => $image_path,
            'user_id' => $user_id,
            'folder_id' => $folder_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
    //写真詳細表示
    public function photoPage($id)
    {
        $data = Image::where('id', $id)->get();
        return $data[0];
    }
    //写真メモ作成

}
