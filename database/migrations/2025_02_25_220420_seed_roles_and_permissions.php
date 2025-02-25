<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration {
    public function up(): void
    {
        // Crear roles
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'cliente']);

        // Crear permisos
        $administrarProductos = Permission::create(['name' => 'administrar productos']);
        $verInicio = Permission::create(['name' => 'ver inicio']);


        // Asignar permisos al rol admin
        $admin->givePermissionTo($administrarProductos);
        $admin->givePermissionTo($verInicio);

        // Asignar permisos al rol user
        $user->givePermissionTo($verInicio);
    }

    public function down(): void
    {
        Role::whereIn('name', ['admin', 'cliente'])->delete();
        Permission::whereIn('name', ['administrar productos', 'ver inicio'])->delete();
    }
};
