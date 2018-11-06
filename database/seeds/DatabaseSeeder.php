<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Event;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'geovanne',
            'email' => 'g@upe.br',
            'password' => bcrypt('123456'),
            'type' => 'admin',
            'active' => true,
        ]);

        // $this->call(UsersTableSeeder::class);

        $user = User::where('name', '=', 'geovanne')->first();
        Event::create([
            'name' => 'Jornada de Ciência e Extensão',
            'initials' => 'JCE',
            'date' => '2018-10-24',
            'description' => 'Evento para submissão de artigos dos alunos da UPE',
            'qualis' => 'qualis',
            'link' => 'https://super.upecaruaru.com.br/jce/',
            'deadline' => '2018-10-21',
            'user_id' => $user->id,
        ]);
        Event::create([
            'name' => 'Evento qualquer',
            'initials' => 'Evt',
            'date' => '2018-12-31',
            'description' => 'Um evento qualquer',
            'qualis' => 'qualis',
            'link' => 'link',
            'deadline' => '2018-11-15',
            'user_id' => $user->id,
        ]);
    }
}
