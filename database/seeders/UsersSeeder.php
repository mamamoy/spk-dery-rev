<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'password' => bcrypt('admin'),
                'role' => '1'
            ],
            [
                'name' => 'pasien',
                'tempat' => 'surabaya',
                'username' => 'pasien',
                'tanggal' => '2023-02-02',
                'kelamin' => 'l',
                'password' => bcrypt('pasien'),
                'role' => '0'
            ],
        ];
        DB::table('users')->insert($user);
    }
}
