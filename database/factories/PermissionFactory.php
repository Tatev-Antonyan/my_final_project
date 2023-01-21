<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'permission' => fake()->randomElement(['User_create', 'User_edit', 'User_delete', 'User_view', 'Role_create',
                                                   'Role_edit', 'Role_delete', 'Role_view', 'Post_add', 'Post_edit',
                                                   'Post_delete', 'Post_read', 'Post_translate', 'Accept_post', 'Reject_post']),
        ];
    }
}
