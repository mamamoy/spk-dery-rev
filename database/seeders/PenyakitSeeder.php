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
                'definisi' => 'Campak merupakan infeksi yang disebabkan oleh virus. Campak sangat mudah menular, penularan biasanya melalui saluran napas. Prosesnya adalah Ketika pengidap campak bersin atau batuk. Kemudian percikan liur terhirup oleh orang-orang terdekatnya sehingga campak mula menyebar. Campak juga bisa ditularkan saat berbagi makanan atau minuman. Namun sekarang campak sudah jarang ditemui, kecuali jika balita tidak melakukan vaksinasi, dikarenakan jika tidak melakukan vaksinasi, balita akan mudah tertular.',
                'solusi' => 'Perbanyak minum air putih, membatasi kontak dengan lingkungan sekitar, rutin menjalankan imunisasi campak',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T02',
                'nama_penyakit' => 'Cacingan',
                'definisi' => 'Cacingan merupakan infeksi cacing parasit yang hidup didalam usus manusia. Cacing yang tinggal di dalam usus manusia tersebut akan memakan sari-sari makanan. Penyebab cacingan disebabkan oleh lingkungan kotor dan makanan yang kurang bersih atau steril. Hal tersebut dapat meningkatkan risiko terkena cacingan.',
                'solusi' => 'Rutin mencuci kaki dan tangan sesudah beraktivitas, rutin memotong kuku, menjaga kebesihan anus sesudah buang air besar, hindari kebiasaan mengigit kuku',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T03',
                'nama_penyakit' => 'Stunting',
                'definisi' => 'Stunting merupakan gangguan pertumbuhan atau perkembangan anak akibat kekurangan gizi. Biasanya di tandai dengan panjang atau tinggi badannya berada dibawah rentang normal yaitu -2 dari standar dervisasi (SD). Stunting disebabkan oleh asupan kalori yang tidak terpenuhi, faktor ekonomi (kemiskinan).',
                'solusi' => 'Penuhi kebutuhan nutrisi saat hamil, berikan ASI selama 6 bulan, kombinasikan ASI dengan MPASI yang bernutrisi, menjaga kebersihan lingkungan, selalu memantau pertumbuhan anak',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T04',
                'nama_penyakit' => 'Autis Infantil',
                'definisi' => 'Autis infantile adalah suatu masalah otak yang mengakibatkan hilangnya atau berkurangnya kemampuan dalam berkomunikasi. Hal tersebut ditandai dengan tidak fokus, kesulitan tidur, suka melakukan kegiatan berulang-ulang dan tidak dapat menunjuk benda. Pengidap atusime dapat didiagnosa dengan pengamatan klinis yang cermat, meliputi wawancara untuk mengetahui Riwayat perkembangan anak dan pemeriksaan fisik secara berkala.',
                'solusi' => 'Menjalani hidup sehat, menghindari konsumi obatobatan atau alkohol saat hamil, pastikan sudah mendapatkan vaksin, terutama vaksin rubella, konsumsi asam folat',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T05',
                'nama_penyakit' => 'Hidrosefalus',
                'definisi' => 'Hidrosefalus adalah infeksi penumpukan cairan pada rongga otak sehingga meningkatkan tekanan pada otak. Hidrosefalus disebabkan oleh ketidakseimbangan antara produksi dan penyerapan cairan di dalam otak. Akibatnya cairan yang menumpuk tersebut membuat kepala menjadi membesar dan mata mengecil.',
                'solusi' => 'Melakukan vaksinasi MMR, rutin melakukan pemeriksaan saat kehamilan ke dokter, pastikan asupan gizi seimbang, menjaga bayi dari cedera kepala',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T06',
                'nama_penyakit' => 'Marasmus',
                'definisi' => 'Marasmus adalah salah satu gizi buruk (malnutrisi), kondisi tersebut terjadi ketika tubuh tidak mengkonsumsi cukup protein dan kalori. Marasmus sering dialami anak-anak dengan gejala umum yaitu kekurangan berat badan, diare kronis, cacat intelektual kulit kering dan rambut mudah rapuh atau rontok.',
                'solusi' => 'Konsumsi makanan tinggi protein, konsumsi vitamin, berikan ASI ekslusif 6 bulan pertama, pastikan menggunakan air bersih untuk makan, minum dan mandi',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T07',
                'nama_penyakit' => 'Celebral Palsy',
                'definisi' => 'Celebral palsy adalah gangguan kerusakan otak pada anak-anak yang berkaitan dengan gerak dan koordinasi tubuh. Penyebab celebral palsy masih belum diketahui namun sering terjadi saat anak masih didalam kandungan. Kondisi tersebut ditandai dengan melemahnya sistem saraf, seperti Gerakan, intelektual, pendengaran serta kemampuan berbicara.',
                'solusi' => 'Menghindari konsumi obatobatan atau alkohol saat hamil, menjalani hidup sehat, pastikan sudah mendapatkan vaksin, terutama vaksin rubella',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T08',
                'nama_penyakit' => 'Apraksia',
                'definisi' => 'Apraksia adalah gangguan berbicara sehingga anak mengalami kesulitan membuat Gerakan mulut Ketika berbicara. Apraksia disebabkan oleh kerusakan otak kiri dikarenakan otak tidak dapat membuat dan menyampaikan intruksi gerakan yang benar kepada tubuh. Apraksia dapat terjadi pada anak sejak lahir atau terjadi kecelakaan pada kepala.',
                'solusi' => 'Hindari memberikan arahan yang rumit, mengajarkan berbagai teknik untuk membantu berkomunikasi, ulangi suara secara berulangulang dan pelan-pelan, ajarkan permainan megucapkan kata-kata yang dapat dimengerti',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T09',
                'nama_penyakit' => 'ADHD (Attetion Deficit Hyperactivity Disorder)',
                'definisi' => 'ADHD adalah gangguan mental yang menyebabkan anak sulit memusatkan perhatian serta memiliki perilaku implusif dan hiperaktif, hingga saat ini penyebab ADHD masih belum diketahui tetapi kondisi ini dipengaruhi oleh faktor genetik dan lingkungan. Gejala ADHD pada umumnya muncul diusia dibawah 12 tahun, namun gejala ini dapat terlihat sejak usia 3 tahun.',
                'solusi' => 'Menghindari obat-obatan dan minuman alkohol saat hamil, melindungi anak dari asap rokok dan cat timbal, mengajak anak melakukan aktivitas fisik minimal 60 menit setiap hari, memastikan anak cukup tidur dan istirahat',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode' => 'T10',
                'nama_penyakit' => 'APD (Auditory Processing Disorder)',
                'definisi' => 'APD adalah suatu jenis gangguan pendengaran yang terjadi karena otak tidak dapat memproses suara secara normal. Pengerita APD akan mengalami kesulitan membedakan kata yang mirip. Penyebab APD disebabkan oleh Adanya riwayat penyakit seperti infeksi telinga kronis, meningitis (peradangan selaput otak), keracunan timah, atau penyakit sistem saraf seperti multiple sclerosis, berat badan saat lahir rendah, kelahiran premature, cedera kepala, kelainan genetika.',
                'solusi' => 'Saat hamil, terapkan hidup sehat seperti mencuci tangan, hindari paparan zat kimia seperti asap rokok dan timah, memeriksa kehamilan secara berskala, melakukan imunisasi sesuai jadwal, baik untuk ibu atau bayi',
                'published_at' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        DB::table('penyakits')->insert($penyakit);
    }
}
