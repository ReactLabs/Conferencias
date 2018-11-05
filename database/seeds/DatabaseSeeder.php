<?php

use Illuminate\Database\Seeder;
use App\User;


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
    }
}
