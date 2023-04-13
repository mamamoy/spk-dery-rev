<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Reports</title>

    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/css/pages/fontawesome.css')}}">

    <link rel="stylesheet" type="text/css" media="print" href="{{asset('dist/assets/css/main/print.css')}}">

</head>
<body>
    <div class="container">
        <hr>
        <div class="row justify-content-center title">
            <div class="col-md-6 d-flex align-items-center">
                <h1><strong>SIPATUBA</strong></h1>
            </div>
            <div class="col-md-6">
                <h4 class="text-end">Sistem Pakar Diagnosa Tumbuh Kembang</h4>
                    <p class="fs-6 text-end m-0">Alamat</p>
                    <p class="fs-6 text-end m-0">No Telepon</p>
                    <p class="fs-6 text-end m-0">Email</p>
                    <p class="fs-6 text-end m-0">www.sipatuba.com</p>
            </div>
        </div>
        <hr style="border-width: 3px">
        <hr>
        <h3 class="text-center">Data Pasien</h3>
        <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nama</p>
                            <p>Tanggal Lahir</p>
                            <p>Umur</p>
                        </div>
                        <div class="col-md-6">
                            <p>: {{ $isi->nama_pasien }}</p>
                            <p>: {{ $isi->tLahir }}</p>
                            <p>: {{ $usia }}</p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <p>No Telepon</p>
                            <p>Alamat</p>
                        </div>
                        <div class="col-md-6">
                            <p>: {{ $isi->telp }}</p>
                            <p>: {{ $isi->alamat }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Tanggal Diagnosa</p>
                            <p>Tanggal Cetak</p>
                        </div>
                        <div class="col-md-6">
                            <p>: {{ $isi->created_at->format('Y-m-d H:m') }}</p>
                            <P>: {{$tanggal_cetak}}</P>
                        </div>
                    </div>
                </div>
    
                <hr>
            </div>
        
            <div class="col-md-12">
                <h6><u>Gejala Pasien:</u></h6>
                <ol class="ms-4">
                    @foreach($detail as $gejala)
                        <li>{{ $gejala->dataGejala->nama_gejala }}</li>
                    @endforeach
                </ol>
            </div>
            <hr>
            <h3 class="text-center">Hasil Diagnosa</h3>
            @foreach ($penyakit as $key => $item)
            <hr>
            <div class="col-md-12">
                <h6>Penyakit {{$key+1}} : <u>{{$item->nama_penyakit}}</u></h6>
                <p class="ms-4">{{$item->definisi}}</p>
                <h6>Solusi & Pencegahan :</h6>
                <p class="ms-4">{{$item->solusi}}</p>
            </div>
            @endforeach
            <hr>
    </div>

    <div class="container mb-4 cetak">
        <div class="row text-end">
            <div class="col-md-12">
                <button class="btn btn-outline-primary btn-print" onclick="window.print()">Cetak Laporan <span class="fa-fw select-all fas"></span></button>
            </div>
        </div>
    </div>
</body>


<script src="{{ asset ('dist/assets/js/bootstrap.js')}}"></script>
<script src="{{ asset ('dist/assets/js/app.js')}}"></script>
</html>
