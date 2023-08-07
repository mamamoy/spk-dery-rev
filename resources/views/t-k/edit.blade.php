@extends('layout.main')

@section('title')
    <title>{{ $title }} | SPDTK</title>
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('gejala.index') }}">{{ $subtitle }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><a href="{{ route('tumbuh-kembang.index') }}" class="btn btn-secondary ">
                            <span class="fa fa-arrow-left"></span> | Kembali
                        </a></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('tumbuh-kembang.update', $isi->id) }}" method="POST" data-parsley-validate>
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                                            <input type="text" class="form-control" id="kode" name="kode"
                                            placeholder="Kode Penyakit" value="{{ $isi->kode }}" data-parsley-required="true" data-parsley-required-message="Kode tidak boleh kosong">
                                        @error('kode')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_penyakit" class="col-sm-5 col-form-label">Nama Tumbuh Kembang</label>
                                            <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit"
                                            value="{{ $isi->nama_penyakit }}" placeholder="Nama Penyakit" data-parsley-required="true" data-parsley-required-message="Nama tidak boleh kosong">
                                        @error('nama_penyakit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="definisi" class="col-sm-2 col-form-label">Definisi</label>
                                            <input class="form-control" id="definisi" name="definisi"
                                            value="{{ $isi->definisi }}" placeholder="Deskripsi Definisi"
                                            style="height: 100px">
                                        @error('definisi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="solusi" class="col-sm-2 col-form-label">Solusi</label>
                                            <input class="form-control" id="solusi" name="solusi"
                                            value="{{ $isi->solusi }}" placeholder="Solusi"
                                            style="height: 100px">
                                        @error('solusi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="id" value="{{ $isi->id }}">
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                text: '{{ session('error') }}',
            })

        </script>
    @endif


@endpush