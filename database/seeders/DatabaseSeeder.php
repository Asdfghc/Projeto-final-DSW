<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Reserva;
use App\Models\Convidado;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'comerc']);
        Role::create(['name' => 'ope']);
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@staff.com',
            'password' => bcrypt('admin')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'comerc',
            'email' => 'comerc@staff.com',
            'password' => bcrypt('comerc')
        ]);
        $user->assignRole('comerc');

        $user = User::create([
            'name' => 'ope',
            'email' => 'ope@staff.com',
            'password' => bcrypt('ope')
        ]);
        $user->assignRole('ope');

    }
}
