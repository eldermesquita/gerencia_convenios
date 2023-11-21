<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list aditivos']);
        Permission::create(['name' => 'view aditivos']);
        Permission::create(['name' => 'create aditivos']);
        Permission::create(['name' => 'update aditivos']);
        Permission::create(['name' => 'delete aditivos']);

        Permission::create(['name' => 'list contratos']);
        Permission::create(['name' => 'view contratos']);
        Permission::create(['name' => 'create contratos']);
        Permission::create(['name' => 'update contratos']);
        Permission::create(['name' => 'delete contratos']);

        Permission::create(['name' => 'list convenios']);
        Permission::create(['name' => 'view convenios']);
        Permission::create(['name' => 'create convenios']);
        Permission::create(['name' => 'update convenios']);
        Permission::create(['name' => 'delete convenios']);

        Permission::create(['name' => 'list empresas']);
        Permission::create(['name' => 'view empresas']);
        Permission::create(['name' => 'create empresas']);
        Permission::create(['name' => 'update empresas']);
        Permission::create(['name' => 'delete empresas']);

        Permission::create(['name' => 'list orgaos']);
        Permission::create(['name' => 'view orgaos']);
        Permission::create(['name' => 'create orgaos']);
        Permission::create(['name' => 'update orgaos']);
        Permission::create(['name' => 'delete orgaos']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
