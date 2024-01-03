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

        Permission::create(['name' => 'list categrias']);
        Permission::create(['name' => 'view categrias']);
        Permission::create(['name' => 'create categrias']);
        Permission::create(['name' => 'update categrias']);
        Permission::create(['name' => 'delete categrias']);

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

        Permission::create(['name' => 'list modalidades']);
        Permission::create(['name' => 'view modalidades']);
        Permission::create(['name' => 'create modalidades']);
        Permission::create(['name' => 'update modalidades']);
        Permission::create(['name' => 'delete modalidades']);

        Permission::create(['name' => 'list orgaos']);
        Permission::create(['name' => 'view orgaos']);
        Permission::create(['name' => 'create orgaos']);
        Permission::create(['name' => 'update orgaos']);
        Permission::create(['name' => 'delete orgaos']);

        Permission::create(['name' => 'list parlamentares']);
        Permission::create(['name' => 'view parlamentares']);
        Permission::create(['name' => 'create parlamentares']);
        Permission::create(['name' => 'update parlamentares']);
        Permission::create(['name' => 'delete parlamentares']);

        Permission::create(['name' => 'list processos']);
        Permission::create(['name' => 'view processos']);
        Permission::create(['name' => 'create processos']);
        Permission::create(['name' => 'update processos']);
        Permission::create(['name' => 'delete processos']);

        Permission::create(['name' => 'list processohistoricos']);
        Permission::create(['name' => 'view processohistoricos']);
        Permission::create(['name' => 'create processohistoricos']);
        Permission::create(['name' => 'update processohistoricos']);
        Permission::create(['name' => 'delete processohistoricos']);

        Permission::create(['name' => 'list situacoes']);
        Permission::create(['name' => 'view situacoes']);
        Permission::create(['name' => 'create situacoes']);
        Permission::create(['name' => 'update situacoes']);
        Permission::create(['name' => 'delete situacoes']);

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

        Permission::create(['name' => 'list usuarios']);
        Permission::create(['name' => 'view usuarios']);
        Permission::create(['name' => 'create usuarios']);
        Permission::create(['name' => 'update usuarios']);
        Permission::create(['name' => 'delete usuarios']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $usuario = \App\Models\Usuario::whereEmail('admin@admin.com')->first();

        if ($usuario) {
            $usuario->assignRole($adminRole);
        }
    }
}
