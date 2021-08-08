<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'intro', 'image_path', 'admin_id'];

    public function members() {
        return $this->belongsToMany(Member::class, 'group_member', 'group_id', 'mem_id');
    }

}
