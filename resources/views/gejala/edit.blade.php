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
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('gejala.index') }}">{{ $subtitle }}</a></li>
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
                            <h4 class="card-title"><a href="{{ route('gejala.index') }}" class="btn btn-secondary ">
                                    <span class="fa fa-arrow-left" title="Edit"></span> | Kembali
                                </a></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('gejala.update', $isi->id) }}" method="POST"
                                    data-parsley-validate>
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kode_gejala" class="col-sm-4 col-form-label">Kode Gejala</label>
                                                <input type="text" class="form-control" id="kode_gejala"
                                                    name="kode_gejala" placeholder="Kode Gejala"
                                                    value="{{ $isi->kode_gejala }}" data-parsley-required="true"
                                                    data-parsley-required-message="Kode gejala tidak boleh kosong">
                                                @error('kode_gejala')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_gejala" class="col-sm-4 col-form-label">Nama Gejala</label>
                                                <input type="text" class="form-control" id="nama_gejala"
                                                    name="nama_gejala" value="{{ $isi->nama_gejala }}"
                                                    placeholder="Deskripsi Gejala" data-parsley-required="true"
                                                    data-parsley-required-message="Nama gejala tidak boleh kosong">
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
                text: 'Data gagal disimpan!',
            })
        </script>
    @endif
@endpush
