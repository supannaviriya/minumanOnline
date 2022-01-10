<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
        [
            'id' => '1',
            'name' => 'Supanna Viriya Guna Kongoasa',
            'level' => 'user',
            'email' => 'viriya030301@gmail.com',
            'password' => Hash::make('viriya331'),
            'username' => 'viriya331'
        ],

        [
            'id' => '2',
            'name' => 'The Admin',
            'level' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'username' => 'admin_123'
        ],

    ]);

    }
}
