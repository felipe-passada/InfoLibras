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

        foreach (range(1,10) as $index) {
            $name = $faker->name;

            DB::table('users')->insert([
                'name' => $name,
                'email' => Str::snake($name).'@ifsp.com',
                'user_type' => $faker->randomElement(
                    ['admin','servidor','interprete','gestor_dpto', 'audio_visual']
                ),
                'password' => bcrypt('123456'),
    
            ]);
        }
    }
}
