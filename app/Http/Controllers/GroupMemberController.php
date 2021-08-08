<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use Illuminate\Support\Facades\DB;

class GroupMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    use ApiResponser;

    public function store($id) {
        $memId = Auth::id();
        try {
            Group::find($id)->members()->attach($memId);
        } catch (\Exception $e) {
            return $this->error('그룹 가입 요청에 실패하였습니다.', 500);
        }

        return $this->success('그룹 가입 요청을 완료하였습니다.');
    }

    public function index($id) {
        try {
            $members = DB::table('group_member as gm')
                ->join('members as m', function($join) use ($id) {
                    $join->on('m.id', 'gm.mem_id')->where('gm.group_id', $id);
                })
                ->orderBy('gm.state') // 오름차순
                ->orderby('gm.created_at', 'DESC') // 내림차순 (최근순)
                ->orderBy('gm.accepted_at', 'DESC') // 내림차순 (최근순)
                ->get(['m.id', 'm.user_id', 'gm.state']);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }

        return $this->success($members);
    }

}
