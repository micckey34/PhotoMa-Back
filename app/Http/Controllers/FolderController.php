<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FolderController extends Controller
{
    public function folder($id)
    {
        $folders = Folder::select('id', 'folder_name')->where('user_id', $id)->get();
        return $folders;
    }


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
}
