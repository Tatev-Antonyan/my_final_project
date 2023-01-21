<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
    ];

//    public function role()
//    {
//        return $this->hasMany(User::class);
//    }

    public function role_permission(){
        return $this->hasMany(Role_Permission::class);
    }

    public function user_role()
    {
        return $this->hasMany(User_Role::class);
    }

}
