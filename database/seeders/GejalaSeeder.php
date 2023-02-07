<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gejala = [

            [
                'kode_gejala' => 'G01',
                'nama_gejala' => 'Demam',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G02',
                'nama_gejala' => 'Bagian rongga mulut terdapat bercak putih',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G03',
                'nama_gejala' => 'Pilek',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G04',
                'nama_gejala' => 'Mata merah dan berair',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G05',
                'nama_gejala' => 'Kemerahan pada kulit',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G06',
                'nama_gejala' => 'Diare',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G07',
                'nama_gejala' => 'Tidak nafsu makan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G08',
                'nama_gejala' => 'Mual',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G09',
                'nama_gejala' => 'Muntah',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G10',
                'nama_gejala' => 'Adanya cacing pada tinja',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G11',
                'nama_gejala' => 'Adanya darah pada feses',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G12',
                'nama_gejala' => 'Berat badan menurun 10% dibawah rentang ideal',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G13',
                'nama_gejala' => 'Pertumbuhan gigi dan tubuh terlambat',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G14',
                'nama_gejala' => 'Pertumbuhan tulang terlambat',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G15',
                'nama_gejala' => 'Lemas',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G16',
                'nama_gejala' => 'Ketika dipanggil nama tidak merespon',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G17',
                'nama_gejala' => 'Tidak dapat menunjuk benda',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G18',
                'nama_gejala' => 'Belum bisa berbicara dibawah 3 tahun',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G19',
                'nama_gejala' => 'Kesulitan tidur',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G20',
                'nama_gejala' => 'Tidak fokus',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G21',
                'nama_gejala' => 'Suka melakukan kegiatan berulang-ulang',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G22',
                'nama_gejala' => 'Sulit bila digendong',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G23',
                'nama_gejala' => 'Menolak untuk dipeluk',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G24',
                'nama_gejala' => 'Suka menangis dan tertawa tanpa sebab',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G25',
                'nama_gejala' => 'Tidak mau menatap mata',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G26',
                'nama_gejala' => 'Suka memainkan jari didepan mata',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G27',
                'nama_gejala' => 'Suka bermain dengan cahaya',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G28',
                'nama_gejala' => 'Mata mengecil',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G29',
                'nama_gejala' => 'Kejang',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G30',
                'nama_gejala' => 'Kesulitan bernapas',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G31',
                'nama_gejala' => 'Ukuran kepala besar',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G32',
                'nama_gejala' => 'Ubun-ubun kepala mencembung',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G33',
                'nama_gejala' => 'Mudah marah',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G34',
                'nama_gejala' => 'Rambut rontok',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G35',
                'nama_gejala' => 'Kuling kering dan kasar',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G36',
                'nama_gejala' => 'Pusing',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G37',
                'nama_gejala' => 'Merasakan lapar terus-menerus',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G38',
                'nama_gejala' => 'Kesulitan berjalan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G39',
                'nama_gejala' => 'Gerakan tubuh tidak terkontrol',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G40',
                'nama_gejala' => 'Otot terasa kaku',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G41',
                'nama_gejala' => 'Kesulitan berbicara',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G42',
                'nama_gejala' => 'Kesulitan menggerakan anggota tubuh',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G43',
                'nama_gejala' => 'Kesulitan merangkai kata-kata',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G44',
                'nama_gejala' => 'Kesulitan mengucapkan kata-kata panjang',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G45',
                'nama_gejala' => 'Menghilangkan konsonan kata awal dan akhir',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G46',
                'nama_gejala' => 'Selalu berjuang untuk membuat kata-kata',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G47',
                'nama_gejala' => 'Lebih suka menggunakan komunkasi non-verbal secara berlebihan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G48',
                'nama_gejala' => 'Banyak berbicara',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G49',
                'nama_gejala' => 'Gelisah',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G50',
                'nama_gejala' => 'Tidak bisa diam',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G51',
                'nama_gejala' => 'Mudah merasa bosan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G52',
                'nama_gejala' => 'Tidak bisa menjaga kontak mata',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G53',
                'nama_gejala' => 'Seringkali berjalan mondar-mandir tanpa tujuan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G54',
                'nama_gejala' => 'Permintaan harus segeri dipenuhi',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G55',
                'nama_gejala' => 'Kesulitan membedakan bunyi yang mirip',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G56',
                'nama_gejala' => 'Kesulitan memahami pembicaraan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G57',
                'nama_gejala' => 'Kesulitan menemukan sumber suara',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_gejala' => 'G58',
                'nama_gejala' => 'Kesulitan mengingat perintah yang diucapkan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        DB::table('gejalas')->insert($gejala);
    }
}
