<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'role' => 'Admin'],
            ['id' => 2, 'role' => 'Moderator'],
            ['id' => 3, 'role' => 'Translator'],
            ['id' => 4, 'role' => 'User'],
            ['id' => 5, 'role' => 'Guest'],
        ];

        foreach ($items as $item) {
            Role::create($item);
        }
    }
}
