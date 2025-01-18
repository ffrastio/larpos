<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create user

        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@monkermart.com',
            'password' => bcrypt('AdminMonkermart17')
        ]);

        // Permission
        $permissions = Permission::all();

        // Role
        $role = Role::find(1);

        //assign permission to role
        $role->syncPermissions($permissions);

        //assign role to user
        $user->assignRole($role);
    }
}
