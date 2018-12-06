<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Event;
use App\Area;
use App\Tag;


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

        Area::create([
            'name' => 'si'
        ]);

        $area = Area::where('name', '=', 'si')->first();
        Tag::create([
            'name' => 'banco de dados',
            'area_id' => $area->id
        ]);


        $user = User::where('name', '=', 'geovanne')->first();
        $area = Area::where('name', '=', 'si')->first();
        $tag = Tag::where('area_id', '=', $area->id)->first();
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

        $event = Event::where('name', '=', 'Jornada de Ciência e Extensão')->first();
        $event->areas()->attach($area);
        $event->tags()->attach($tag);
    }
}
