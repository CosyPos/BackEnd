<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        // Create basic roles
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Full access to all system features',
        ]);

        $managerRole = Role::create([
            'name' => 'manager',
            'display_name' => 'Manager',
            'description' => 'Manage content and users',
        ]);

        $editorRole = Role::create([
            'name' => 'employee',
            'display_name' => 'Employee',
            'description' => 'Can create and edit content',
        ]);
    }
}
