<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Agenda;
use App\Models\Reserva;
use App\Models\Servico;
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


        Servico::create([
            'pacote' => '<p>Teste 1</p>',
            'imagem' => 'https://images.unsplash.com/photo-1525203135335-74d272fc8d9c?auto=format&fit=crop&q=80&w=1600&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'valor' => '1000'
        ]);

        Servico::create([
            'pacote' => '<p>Teste 2</p>',
            'imagem' => 'https://images.unsplash.com/photo-1525203135335-74d272fc8d9c?auto=format&fit=crop&q=80&w=1600&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'valor' => '2000'
        ]);

        Servico::create([
            'pacote' => '<p>Teste 3</p>',
            'imagem' => 'https://images.unsplash.com/photo-1525203135335-74d272fc8d9c?auto=format&fit=crop&q=80&w=1600&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'valor' => '3000'
        ]);


        Agenda::create([
            'inicio' => '08:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '08:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '08:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '08:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '08:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '08:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '08:00:00',
            'fim' => '20:00:00'
        ]);
    }
}
