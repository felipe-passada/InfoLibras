<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 5; $i++) {
            $name = ['admin', 'servidor', 'gestor', 'interprete', 'audiovisual'];

            DB::table('users')->insert([
                'name' => $name[$i],
                'email' => $name[$i].'@ifsp.com',
                'user_type' => $faker->randomElement(
                    ['admin','servidor','interprete','gestor_dpto', 'audio_visual']
                ),
                'password' => bcrypt('123456'),
    
            ]);
        }
    }
}
