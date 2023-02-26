<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'tempat' => 'surabaya',
                'username' => 'admin',
                'tanggal' => '2023-02-02',
                'kelamin' => 'l',
                'password' => bcrypt('password'),
                'role' => '1'
            ]
        ];
        DB::table('users')->insert($user);
    }
}
