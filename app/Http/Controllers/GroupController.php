<?php

namespace App\Http\Controllers;

use App\Services\GroupService;
use App\Traits\ApiResponser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    use ApiResponser;

    protected $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->middleware('auth:sanctum');
        $this->groupService = $groupService;
    }

    public function store(Request $request) {
        // 유효성 검사
        $data = $request->validate([
            'name' => ['required'],
            'intro' => ['required'],
            'imageFile' => ['required']
        ]);

        $data['admin_id'] = Auth::id();

        try {
            $group = $this->groupService->createGroup($data);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }

        return $this->success($group);
    }

    public function show($id) {
        $memId = Auth::id();
        try {
            $group = $this->groupService->findByIdWithGroupMemberState($id, $memId);
        } catch (ModelNotFoundException $e) {
            return $this->error($e->getMessage(), 404);
        }

        return $this->success($group);
    }

    public function index() {
        $group = $this->groupService->findAll();
        return $this->success($group);
    }

}
