<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupJoin;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function create(Request $request)
    {
        $group_name = $request->input('group_name');
        $user_id = $request->input('user_id');
        $unique_id = '000000';
        // $unique_id = $user_id . uniqid();


        Group::insert([
            'id' => null,
            'group_name' => $group_name,
            'unique_id' => $unique_id,
            'create_user_id' => $user_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $group = Group::orderBy('created_at', 'desc')->first();
        $group_id = $group['id'];
        GroupJoin::insert([
            'id' => null,
            'user_id' => $user_id,
            'group_id' => $group_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
