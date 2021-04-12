<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupJoin;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    //グループリスト表示
    public function groupList($id)
    {
        $groups = GroupJoin::select('groups.id', 'groups.group_name')
            ->join('groups', 'group_joins.group_id', '=', 'groups.id')
            ->where('group_joins.user_id', $id)->get();
        return $groups;
    }

    //グループ作成
    public function create(Request $request)
    {
        $group_name = $request->input('group_name');
        $user_id = $request->input('user_id');
        $unique_id = $user_id . uniqid();
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

    //グループ検索
    public function search(Request $request)
    {
        $unique_id = $request->input('unique_id');
        $groups = Group::where('unique_id', $unique_id)->get();
        $group = $groups[0];
        if (count($groups) > 0) {
            return [
                'id' => $group['id'],
                'group_name' => $group['group_name'],
                'unique_id' => $group['unique_id']
            ];
        }
    }

    //グループ加入
    public function join(Request $request)
    {
        $user_id = $request->input('user_id');
        $group_id = $request->input('group_id');
        $query = ['user_id' => $user_id, 'group_id' => $group_id];
        $group = GroupJoin::where($query)->get();
        if (count($group) < 1) {
            GroupJoin::insert([
                'id' => null,
                'user_id' => $user_id,
                'group_id' => $group_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
    //グループチャット
    //グループ情報編集
}
