<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Services\MemberService;

class MemberController extends Controller
{
    protected $memberService;

    public function __construct(MemberService $memberService) {
        $this->memberService = $memberService;
    }

    public function store(Request $request) {
        // validation check
        $data = $request->only([
            'user_id',
            'password'
        ]);

        // insert
        try {
            return $this->memberService->registerMember($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
