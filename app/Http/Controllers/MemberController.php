<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function store(Request $request) {
        // validation check

        // insert
        try {
            $member = Member::create([
                'user_id' => $request->user_id,
                'password' => Hash::make($request->password),
            ]);
            return $member;
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
