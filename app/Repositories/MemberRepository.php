<?php

namespace App\Repositories;

use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class MemberRepository
{
    protected $member;

    public function __construct(Member $member) {
        $this->member = $member;
    }

    public function save($data) {
        $member = Member::create([
            'user_id' => $data['user_id'],
            'password' => Hash::make($data['password']),
        ]);
        return $member;
    }

}
