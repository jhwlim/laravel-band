<?php

namespace App\Services;

use App\Repositories\MemberRepository;

class MemberService
{
    protected $memberRepository;

    public function __construct(MemberRepository $memberRepository) {
        $this->memberRepository = $memberRepository;
    }

    public function registerMember($data) {
        // validation check & generate exception : check duplication of user_id

        $member = $this->memberRepository->save($data);
        return $member;
    }

}
