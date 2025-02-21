<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        // If you're using a permissions system, you can attach permissions to roles
        // Assuming you have a Permission model and a many-to-many relationship
        
        // Example of attaching permissions (if you have a permissions table)
        // $createPostPermission = Permission::where('name', 'create-post')->first();
        // $editPostPermission = Permission::where('name', 'edit-post')->first();
        
        // $adminRole->permissions()->attach(Permission::all());
        // $managerRole->permissions()->attach([$createPostPermission->id, $editPostPermission->id]);
        // $editorRole->permissions()->attach([$createPostPermission->id]);
    }
}