<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Reserva;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Reserva::create([
            'nome' => 'Test User',
            'data' => '2021-10-12',
            'hora' => '12:00',
            'servico' => 'Corte',
            'nconvidados' => '1',
            'idade' => '18'
        ]);

        Reserva::create([
            'nome' => 'Test User2',
            'data' => '2022-10-12',
            'hora' => '11:00',
            'servico' => 'Corte?',
            'nconvidados' => '10',
            'idade' => '180'
        ]);
    }
}
