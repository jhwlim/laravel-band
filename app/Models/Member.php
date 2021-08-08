<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['user_id', 'password'];

    protected $hidden = ['password'];

    public function groups() {
        return $this->belongsToMany(Group::class, 'group_member', 'mem_id', 'group_id');
    }

}
