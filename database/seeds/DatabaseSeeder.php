<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'firstname' => 'Geoffrey',
            'lastname' => 'Embuscado',
            'username' => 'geoffembuscado',
            'type' => 'ADMIN',
            'email' => 'geoffreyembuscado.work@gmail.com',
            'photo' => 'default_avatar.jpg',
            'password' => Hash::make('Willcodeforfood12'),
        ]);
    }
}
