<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    use HasFactory;

    public function user_role()
    {
        return $this->belongsToMany(User::class, Role::class);
    }
}
