<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penyakit = [
            [
                'kode' => 'T01',
                'nama_penyakit' => 'Campak (Rubella)',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T02',
                'nama_penyakit' => 'Cacingan',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T03',
                'nama_penyakit' => 'Stunting',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T04',
                'nama_penyakit' => 'Autis Infantil',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T05',
                'nama_penyakit' => 'Hidrosefalus',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T06',
                'nama_penyakit' => 'Marasmus',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T07',
                'nama_penyakit' => 'Celebral Palsy',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T08',
                'nama_penyakit' => 'Apraksia',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T09',
                'nama_penyakit' => 'ADHD (Attetion Deficit Hyperactivity Disorder)',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T10',
                'nama_penyakit' => 'APD (Auditory Processing Disorder)',
                'definisi' => null,
                'solusi' => null,
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        DB::table('penyakits')->insert($penyakit);
    }
}
