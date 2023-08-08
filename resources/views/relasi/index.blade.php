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
                    <p class="text-subtitle text-muted">{{ $subtitle }}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="mt-4 ms-4">

                    <!-- Button trigger for scrollbar modal -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalLong">
                        Tambah Data
                    </button>
                </div>

                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Relasi</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ route('relasi.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3 mt-3">
                                        <p>Nama Tumbuh Kembang</p>
                                        <select class="choices form-select" name="relasi_penyakit">
                                            <option value="">Pilih Tumbuh Kembang</option>
                                            @foreach ($daftar as $p)
                                                <option value="{{ $p->id }}">
                                                    {{ $p->kode }} - {{ $p->nama_penyakit }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <p>Nama Gejala</p>
                                        <select class="choices form-select multiple-remove" name="relasi_gejala[]"
                                            multiple="multiple">
                                            <option value="">Pilih Gejala</option>
                                            @foreach ($gejala as $g)
                                                <option value="{{ $g->id }}">
                                                    {{ $g->kode_gejala }} - {{ $g->nama_gejala }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Tutup</span>
                                    </button>
                                    <button id="success" type="submit" class="btn btn-primary ml-1"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Simpan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">KD-Nama TK</th>
                                <th class="text-center">Gejala</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $d)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center" style="width: 300px">{{ $d['kode'] }} -
                                        {{ $d['nama_penyakit'] }}</td>
                                    <td class="">
                                        {{-- @foreach ($d['gejala'] as $g)
                                            {{$g}} ,
                                        @endforeach --}}
                                        {{ rtrim(implode(', ', $d['gejala']), ',') }}
                                    </td>
                                    <td>
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <a href="/relasi/{{ $d['id'] }}/edit" class="btn btn-sm">
                                                    <span class="fa-fw select-all fas"></span>
                                                </a>
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">Edit
                                            </dd>
                                        </dl>
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <form method="POST" action="{{ route('relasi.destroy', $d['id']) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm">
                                                        <span class="fa-fw select-all fas"></span>
                                                    </button>
                                                </form>
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">Hapus
                                            </dd>
                                        </dl>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
