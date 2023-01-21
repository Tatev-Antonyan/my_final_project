<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'permission' => 'User_create'],
            ['id' => 2, 'permission' => 'User_edit'],
            ['id' => 3, 'permission' => 'User_delete'],
            ['id' => 4, 'permission' => 'User_view'],
            ['id' => 5, 'permission' => 'Role_create'],
            ['id' => 6, 'permission' => 'Role_edit'],
            ['id' => 7, 'permission' => 'Role_delete'],
            ['id' => 8, 'permission' => 'Role_view'],
            ['id' => 9, 'permission' => 'Post_add'],
            ['id' => 10, 'permission' => 'Post_edit'],
            ['id' => 11, 'permission' => 'Post_delete'],
            ['id' => 12, 'permission' => 'Post_read'],
            ['id' => 13, 'permission' => 'Post_translate'],
            ['id' => 14, 'permission' => 'Accept_post'],
            ['id' => 15, 'permission' => 'Reject_post'],
        ];

        foreach ($items as $item) {
            Permission::create($item);
        }
   }
}
