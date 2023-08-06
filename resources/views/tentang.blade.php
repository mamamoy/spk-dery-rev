@extends('layout.logreg')

@section('title')
    <title>{{ $title }} | SPDTK</title>
@endsection

@section('content')
<div class="content-wrapper container">

    <div class="page-heading d-flex align-items-center">
        <span class="fw-bold fs-4">{{ $title }}</span>
    </div>
    <div class="page-content">
                <div class="card">
                    <div class="card-body">
                        <article>
                            <h3 class="text-center mb-4">Sistem Pakar Diagnosa
                                Tumbuh Kembang Balita Dengan Metode Forward Chaining Berbasis Website Di Puskesmas Sekardangan</h3>
                                <div class="text-center mb-3 mt-2">
                                    <img src="{{ asset('dist/assets/images/pk.jpg') }}" alt="Pohon Keputusan" style="height: 500px">
                                </div>
                                <div class="text-center">
                                    <p style="font-size: 0.9em"><i>Gambar Pohon Keputusan</i></p>
                                </div>
                                <p>Balita merupakan istilah dari kata bawah lima tahun atau anak yang telah
                                    menginjak usia diatas satu tahun. Pada masa ini balita dipengaruhi oleh
                                    pertumbuhan dasar dan perkembangan kemampuan berbahasa, kreativitas,
                                    emosional dan kemampuan berjalan (Fitriana, 2019). Usia balita dikelompokkan
                                    dalam 2 kelompok yaitu anak usia 1-3 tahun (balita) dan anak 3-5 tahun
                                    (prasekolah), pada usia ini balita cukup rentan terhadap berbagai penyakit yang
                                    diakibatkan oleh kekurangan atau kelebihan asupan nutrisi yang merupakan masa
                                    penting dalam tumbuh kembang.
                                </p>
                                <br>
                                <p>
                                    Pertumbuhan merupakan bertambahnya ukuran fisik dan struktur tubuh
                                    secara sebagian atau keseluruhan sedangkan perkembangan merupakan
                                    bertambahnya struktur fungsi tubuh yang meliputi gerak kasar, gerak halus, bicara,
                                    serta sosialisasi (Merita, 2019). Namun ada faktor-faktor yang mempengaruhi
                                    tumbuh kembang balita yaitu faktor internal dan faktor eksternal, dimana faktor
                                    internal meliputi umur, jenis kelamin, genetik sedangkan faktor eksternal meliputi
                                    gizi, radiasi, infeksi dan psikologi ibu. Hal tersebut dapat membuat balita
                                    mengalami gangguan pertumbuhan fisik seperti wasting, stunting, overweight dan
                                    gangguan perkembangan seperti penyimpangan perilaku, keterlambatan motorik
                                    kasar, motorik halus, bicara dan bahasa. Seringkali orangtua tidak menyadari bahwa
                                    anaknya mengalami keterlambatan pertumbuhan dan perkembangannya, tidak
                                    sedikit orangtua segera menyimpulkan gangguan tumbuh kembang yang diderita
                                    oleh balita dengan mencari informasi dalam internet dengan gejala-gejala yang
                                    dialami, hal ini biasanya disebut self diagnosis tanpa memeriksakan terlebih dahulu
                                    kepada tenaga medis. Dalam hal tersebut maka dibutuhkan sebuah sistem layanan
                                    kesehatan agar dapat memudahkan dalam mendeteksi maupun mendiagnosa
                                    gangguan tumbuh kembang sedari dini.
                                </p>
                                <br>
                                <p>
                                    Sistem pakar merupakan aplikasi yang menggunakan komputer untuk
                                    menyelesaikan masalah yang dipikirkan oleh para pakar. Pakar yang dijelaskan
                                    dalam hal ini adalah orang yang memiliki keahlian khusus yang bisa menyelesaikan
                                    masalah yang tidak bisa diselesaikan oleh orang awam. Pada penelitian ini, peneliti
                                    menggunakan metode forward chaining yaitu pelacakan dimulai dari penelusuran
                                    semua data dan aturan untuk mencapai tujuan. Metode forward chaining cocok
                                    untuk mendiagnosis gangguan tumbuh kembang dengan pelacakan dari gejala-
                                    gejala yang diderita.
                                    Berdasarkan pembahasan diatas, maka peneliti ingin membangun sistem
                                    pakar tentang tumbuh kembang pada balita dengan judul “Sistem Pakar Diagnosa
                                    Tumbuh Kembang Balita Dengan Metode Forward Chaining Berbasis Website”.
                                    Metode forward chaining terbukti cara yang paling tepat dalam mendeteksi, karena
                                    sistem ini memberikan informasi berdasarkan fakta yang didapat dari seorang pakar
                                    dan beberapa sumber lainnya. Sistem ini bertujuan untuk membantu dokter atau
                                    pakar dalam memberikan informasi tentang gangguan tumbuh kembang balita,
                                    dengan adanya sistem ini diharapkan dapat memberikan informasi dan cara
                                    pencegahannya secara tepat mengenai tumbuh kembang balita.</p>
                        </article>
                    </div>
                </div>

            </div>
    </div>
@endsection

@push('scripts')
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js "></script>
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data anda berhasil disimpan',
            })
        </script>
    @endif
@endpush
