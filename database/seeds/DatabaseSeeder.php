<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(QrcodeTableSeeder::class);
        // $this->call(...TableSeeder::class);
        // $this->call(...TableSeeder::class);
        // $this->call(...TableSeeder::class);
        // $this->call(...TableSeeder::class);

    }
}
