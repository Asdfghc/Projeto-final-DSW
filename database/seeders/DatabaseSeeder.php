<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Convidado;
use App\Models\User;
use App\Models\Reserva;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'administrador',
            'email' => 'administrador@staff.com',
            'password' => 'administrador'
        ]);

        User::create([
            'name' => 'comercial',
            'email' => 'comercial@staff.com',
            'password' => 'comercial'
        ]);

        User::create([
            'name' => 'operacional',
            'email' => 'operacional@staff.com',
            'password' => 'operacional'
        ]);

        //Convidado::create([
        ////'user_id' => '42',
        //    'name' => 'Test User',
        //    'CPF' => '12345678910',
        //    'idade' => '18'
        //]);

    }
}
