<?php

namespace App\Services;

use App\Repositories\GroupRepository;
use Illuminate\Support\Facades\Storage;

class GroupService
{
    protected $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function createGroup($data) {
        try {
            $data['imagePath'] = $data['imageFile']->store('groups', 'public');
            return $this->groupRepository->save($data);
        } catch (\Exception $e) {
            Storage::delete('public/'.$data['imagePath']);
            throw new \Exception($e->getMessage());
        }
    }

    public function findById($id) {
        return $this->groupRepository->findById($id);
    }

}
