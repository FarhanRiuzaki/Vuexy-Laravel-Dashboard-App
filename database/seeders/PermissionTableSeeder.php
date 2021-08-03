<?php

namespace Database\Seeders;

use App\Models\Permission as ModelsPermission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role.index',
            'role.create',
            'role.edit',
            'role.delete',
            'user.index',
            'user.create',
            'user.edit',
            'user.delete',
            'permission.index',
            'permission.create',
            'permission.edit',
            'permission.delete',
         ];
      
         foreach ($permissions as $permission) {
              ModelsPermission::create(['name' => $permission]);
         }

        // default role
        $role = Role::create([
            'name'  => 'super-admin'
        ]);
        $role = Role::where('name', 'super-admin')->first();
        
        // sync permissions to role
        $role->syncPermissions($permissions);
    }
}
