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
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#border-less">
                        Tambah Data
                    </button>
                </div>
                <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1"
                    aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <form action="{{ route('relasi.store') }}" method="POST">
                                @csrf
                                <div class="modal-header justify-content-end">
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                        aria-label="Tutup">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <div>
                                    <h5 class="modal-title text-center">Input Relasi</h5>
                                </div>
                                <div class="modal-body" style="height: 500px">
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
                                        <select class="choices form-select multiple-remove" name="relasi_gejala[]" multiple="multiple">
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
                                    <td class="text-center" style="width: 300px">{{ $d['kode'] }} - {{ $d['nama_penyakit'] }}</td>
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
                                                    <span class="fa-fw select-all fas">???</span>
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
                                                        <span class="fa-fw select-all fas">???</span>
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
