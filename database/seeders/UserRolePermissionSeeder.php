<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $librarian = User::create(array_merge([
                'email' => 'staffPerpus1@polban.ac.id',
                'name' => 'librarian'
            ], $default_user_value));
    
            $super_admin = User::create(array_merge([
                'email' => 'superAdmin@polban.ac.id',
                'name' => 'superadmin'
            ], $default_user_value));
    
            //Created Role
            $role_librarian = Role::create(['name' => 'librarian']);
            $role_super_admin = Role::create(['name' => 'superadmin']);
        
            //Give Permission
            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);
    
            //Assignment Role
            $librarian -> assignRole('librarian');
            $super_admin -> assignRole('superadmin');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

    }
}