<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_Permission extends Model
{
    use HasFactory;

    public function role_permission()
    {
        return $this->belongsToMany(Role::class, Permission::class);
    }

}
