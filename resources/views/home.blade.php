@extends('layout.logreg')

@section('title')
    <title>{{ $title }} | SPDTK</title>
    {{-- @dd(session()->all()) --}}
@endsection

@section('content')

        <div class="content-wrapper container">

            <div class="page-heading d-flex align-items-center">
                <span class="fw-bold fs-4">{{ $title }}</span><span
                    class="fw-bold ms-2">{{ $subtitle }}</span>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="row">
                                <div class="d-flex align-items-center justify-content-around">
                                    <img src="{{ asset('dist/assets/images/itats.png') }}" alt="ITATS" style="height:300px">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Selamat datang di SIPATUBA</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <p>Sipatuba adalah aplikasi yang dibuat untuk diagnosa gangguan tumbuh kembang pada
                                    balita.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informasi Tumbuh Kembang</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <p>Untuk melihat informasi tumbuh kembang pada balita, klik <a
                                        href="/daftar-penyakit">link tautan dibawah ini.</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    @endsection

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            })
        </script>
    @elseif ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data gagal disimpan!',
            })
        </script>
    @endif
@endpush