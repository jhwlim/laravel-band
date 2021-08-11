<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'intro', 'image_path', 'admin_id'];

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ];

    public function members() {
        return $this->belongsToMany(Member::class, 'group_member', 'group_id', 'mem_id');
    }

}
