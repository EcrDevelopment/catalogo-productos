<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdminUser extends Command
{
    protected $signature = 'make:admin {email} {name=Admin} {password=admin123}';
    protected $description = 'Crea un usuario administrador';

    public function handle()
    {
        $email = $this->argument('email');
        $name = $this->argument('name');
        $password = $this->argument('password');

        // Verifica si el usuario ya existe
        if (User::where('email', $email)->exists()) {
            $this->error('El usuario ya existe.');
            return;
        }

        // Verifica si el rol "admin" existe, si no lo crea
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Crea el usuario
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // Asigna el rol "admin" al usuario
        $user->assignRole($adminRole);

        $this->info('Usuario administrador creado exitosamente.');
    }
}
