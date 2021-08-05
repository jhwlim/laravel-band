<?php

namespace App\Repositories;

use App\Models\Group;

class GroupRepository
{
    protected $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function save($data) {
        $group = Group::create([
            'name' => $data['name'],
            'intro' => $data['intro'],
            'image_path' => $data['imagePath'],
            'admin_id' => $data['admin_id']
        ]);
        return $group;
    }

    public function findById($id) {
        $group = Group::findOrFail($id);
        return $group;
    }
}
