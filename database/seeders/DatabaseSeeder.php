<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Agenda;
use App\Models\Reserva;
use App\Models\Servico;
use App\Models\Convidado;
use App\Models\Recomendacoes;
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
            'pacote' => '<p style="text-align: center;"><b>Pacote 1</b></span></p><hr><p><em>Salgados: </em></p><p>-Bolinha de queijo<br>-Coxinha<br>-Enroladinho de Salcicha</p><hr><p><em>Doces:</em><br>-Brigadeiro<br>-Beijinho<br>-Doce de leite</p><hr><p><em>Bebidas:</em><br>-Refrigerantes<br>-Sucos Del Vale</p>',

            'imagem1' => 'https://media.discordapp.net/attachments/1160914999611506728/1174448724731252797/salgadinho-bolinhas-de-queijo-buffet-em-domicilio.png?ex=6567a19c&is=65552c9c&hm=dd527838a35d15015b184957955901a740f5282c9f109448609cf7b265c574af&=',
            'imagem2' => 'https://media.discordapp.net/attachments/1160914999611506728/1174448825847517204/refrigerante-ossos-2.png?ex=6567a1b4&is=65552cb4&hm=105c732467eaaeaaa59597c2f444c0e4ed09c63120d4a5d1fb3f214a95c83033&=',
            'imagem3' => 'https://media.discordapp.net/attachments/1160914999611506728/1174449213887746159/brigadeiro-2-62a7a6689aa7f.png?ex=6567a210&is=65552d10&hm=d0d9eb600f17aa527fcae7d627610b20727257039fde9139c2b919dd3d0ae7fc&=&width=676&height=676',
            'valor' => '70'
        ]);


        Agenda::create([
            'inicio' => '10:00:00',
            'fim' => '18:00:00'
        ]);

        Agenda::create([
            'inicio' => '09:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '09:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '09:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '09:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '09:00:00',
            'fim' => '20:00:00'
        ]);

        Agenda::create([
            'inicio' => '09:00:00',
            'fim' => '22:00:00'
        ]);

        Recomendacoes::create([
            'recomendacao' => 'Venha com roupas leves e confortáveis'
        ]);

        Recomendacoes::create([
            'recomendacao' => 'Não esqueça de trazer seu documento de identificação'
        ]);
    }
}
