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
        \App\Models\User::factory(1)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@staff.com',
            'password' => 'admin',
        ]);

        User::create([
            'name' => 'comercial',
            'email' => 'comercial@staff.com',
            'password' => 'comercial',
        ]);

        User::create([
            'name' => 'operacional',
            'email' => 'operacional@staff.com',
            'password' => 'operacional',
        ]);

        Convidado::create([
            //'user_id' => '42',
            'name' => 'Test User',
            'CPF' => '12345678910',
            'idade' => '18'
        ]);

        Reserva::create([
            //'user_id' => '42',
            'nome' => 'Test User',
            'dataehora' => '2021-10-12 11:00:00',
            'servico' => 'Corte',
            'nconvidados' => '1',
            'idade' => '18',
            'status' => 'pendente'
        ]);

        Reserva::create([
            //'user_id' => '42',
            'nome' => 'Test User2',
            'dataehora' => '2022-10-12 11:00:00',
            'servico' => 'Corte?',
            'nconvidados' => '10',
            'idade' => '180',
            'status' => 'pendente'
        ]);
    }
}
