@extends('layout.main')

@section('title')
    <title>{{ $title }} | SPDTK</title>
    <style>
        @media print {
            body * {
        visibility: hidden;
        /* display: none; */
      }
      article {
        visibility: visible;
        page-break-before: avoid;
      }
      article * {
        visibility: visible;
      }
      header{
        display: none;
      }
      .page-title {
        display: none;
      }
    }
    </style>
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                    <p class="text-subtitle text-muted">{{ $subtitle }}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/history">History</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                        <div class="d-grid justify-content-end">

                            <button class="btn btn-outline-primary" onclick="window.print()">Cetak Laporan <span
                                    class="fa-fw select-all fas"></span></button>
                        </div>
                    <article>
                        <hr style="opacity:inherit;">
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6  d-flex align-items-center ">
                                    <h1 class="ms-4">SIPATUBA</h1>
                                </div>
                                <div class="col-6 mb-4">
                                    <h4 class="text-end">Sistem Pakar Diagnosa Tumbuh Kembang</h4>
                                    <p class="fs-6 text-end m-0">Alamat</p>
                                    <p class="fs-6 text-end m-0">No Telepon</p>
                                    <p class="fs-6 text-end m-0">Email</p>
                                    <p class="fs-6 text-end m-0">www.sipatuba.com</p>
                                </div>
                            </div>
                            <hr style="opacity: inherit; margin: 0">
                            <hr style="opacity: inherit; margin-top: 4px;">
                        </div>

                        <div class="mb-4">
                            <h3 class="text-center">Laporan Hasil Diagnosa</h3>
                            {{-- <p class="text-center">Alamat - No Telp</p> --}}
                        </div>
                        <hr style="opacity:inherit;">
                        <div class="row mt-4 mb-4">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-3">
                                        <h6>Nama Pasien</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-8">
                                        <h6>{{ $isi->nama_pasien }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <h6>Tanggal Lahir</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-8">
                                        <h6>{{ $isi->tLahir }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <h6>Usia</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-8">
                                        <h6>{{ $usia }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-3">
                                        <h6>Alamat</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-8">
                                        <h6>{{ $isi->alamat }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <h6>Nomor Telepon</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-8">
                                        <h6>{{ $isi->telp }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <h6>Waktu Periksa</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>:</h6>
                                    </div>
                                    <div class="col-8">
                                        <h6>{{ $isi->created_at }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="opacity:inherit;">
                        <div>
                            <h6><strong><u>Gejala Pasien :</u></strong></h6>
                            <ol>
                                @foreach ($detail as $item)
                                    <li>{{ $item->dataGejala->nama_gejala }}</li>
                                @endforeach
                            </ol>
                        </div>
                        <hr style="opacity:inherit;">
                        <div>
                            <h6><strong><u>Diagnosis :</u></strong></h6>
                            <ol>
                                <li>
                                  <p>Nama Penyakit : <strong><u>{{$penyakit->nama_penyakit}}</u></strong></p>
                                  <ul>
                                    <li class="mb-2">{{$penyakit->definisi}}</li>
                                  </ul>
                                </li>
                                <li>
                                  <p>Solusi dan Pencegahan :</p>
                                  <ul>
                                    <li>{{$penyakit->solusi}}</li>
                                  </ul>
                                </li>
                              </ol>
                        </div>
                        <hr style="opacity:inherit;">
                    </article>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js "></script>
    <script src="{{ asset('dist/assets/extensions/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/pages/ui-todolist.js') }}"></script>
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
