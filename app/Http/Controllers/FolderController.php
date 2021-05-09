<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\GroupPost;
use App\Models\Image;
use App\Models\ImagePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FolderController extends Controller
{

    public function test5()
    {
        $folders = Folder::select('id', 'folder_name')->where('look', 0)->with(['images' => function ($query) {
            $query->Limit(1);
        }])->limit(5)->get();
        return $folders;
    }
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

    //フォルダ削除
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $query = Image::select('id')->where('folder_id', $id)->get();
        GroupPost::where('folder_id', $id)->delete();
        foreach ($query as $image_id) {
            ImagePost::where('image_id', $image_id['id'])->delete();
        }
        Image::where('folder_id', $id)->delete();
        Folder::find($id)->delete();
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

    //写真削除
    public function deleteImage(Request $request)
    {
        $id = $request->input('id');
        ImagePost::where('image_id', $id)->delete();
        Image::where('id', $id)->delete();
    }

    //写真詳細表示
    public function photoPage($id)
    {
        $data = Image::select('images.id', 'images.image_path', 'folders.folder_name')->join('folders', 'images.folder_id', '=', 'folders.id')->where('images.id', $id)->get();
        return $data[0];
    }

    public function getMemo($id)
    {
        $data = ImagePost::where('image_id', $id)->get();
        return $data;
    }

    //写真メモ作成
    public function memoCreate(Request $request)
    {
        $posts = $request->input('posts');
        $image_id = $request->input('image_id');

        ImagePost::insert([
            'posts' => $posts,
            'image_id' => $image_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
