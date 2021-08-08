<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;

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
}
