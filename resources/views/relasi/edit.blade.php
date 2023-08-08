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
                                    href="{{ route('relasi.index') }}">{{ $subtitle }}</a></li>
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
                            <h4 class="card-title"><a href="{{ route('relasi.index') }}" class="btn btn-secondary ">
                                    <span class="fa fa-arrow-left"></span> | Kembali
                                </a></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('relasi.update', $penyakitId) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <p>Nama Tumbuh Kembang</p>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <select class="form-select" name="relasi_penyakit">
                                                {{-- <option value="{{ $penyakit->id }}" {{ $penyakit->id ? 'selected' : '' }}>
                                                    {{ $penyakit->kode }} - {{ $penyakit->nama_penyakit }}</option> --}}
                                                @foreach ($penyakit as $p)
                                                    <option value="{{ $p->id }}"
                                                        {{ $p->id == $penyakitId ? 'selected' : '' }}>
                                                        {{ $p->kode }} - {{ $p->nama_penyakit }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="kode" class="col-sm-2 col-form-label">Gejala</label>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <select class="choices form-select multiple-remove" name="relasi_gejala[]"
                                                multiple="multiple">
                                                <option value="">Pilih Gejala</option>
                                                @foreach ($gejala as $g)
                                                    <option value="{{ $g->id }}"
                                                        {{ in_array($g->id, $gejalaIDs) ? 'selected' : '' }}>
                                                        {{ $g->kode_gejala }} - {{ $g->nama_gejala }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('relasi_gejala')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <input type="hidden" name="id" id="id" value="{{ $penyakitId }}">

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
