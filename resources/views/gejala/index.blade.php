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
                @if (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
                <div class="mt-4 ms-4">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#border-less">
                        Tambah Gejala
                    </button>
                </div>
                <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1"
                    aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
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
                                <h5 class="modal-title text-center">Input Gejala</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('gejala.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 row mt-3">
                                        <label for="kode_gejala" class="col-sm-2 col-form-label">Kode</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kode_gejala" name="kode_gejala"
                                                placeholder="Kode Gejala" value="{{ old('kode_gejala') }}">
                                            @error('kode_gejala')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama_gejala" class="col-sm-2 col-form-label">Gejala</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_gejala" name="nama_gejala"
                                                value="{{ old('nama_gejala') }}" placeholder="Deskripsi Gejala">
                                            @error('nama_gejala')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="gejala_penting" class="col-sm-2 col-form-label">Gejala Penting</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gejala_penting"
                                                    name="gejala_penting" value="1"
                                                    {{ old('gejala_penting') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gejala_penting">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gejala_penting"
                                                    name="gejala_penting" value="0"
                                                    {{ old('gejala_penting') === '0' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gejala_penting">
                                                    Tidak
                                                </label>
                                            </div>
                                            @error('gejala_penting')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                                <th class="text-center">KD-Gejala</th>
                                <th class="text-center">Gejala</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($isi as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->kode_gejala }}</td>
                                    <td class="text-center">{{ $item->nama_gejala }}</td>
                                    <td class="d-flex justify-content-around">
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <a href="/gejala/{{ $item->id }}/edit" class="btn btn-sm">
                                                    <span class="fa-fw select-all fas"></span>
                                                </a>
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">Edit
                                            </dd>
                                        </dl>
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <form method="POST" action="{{ route('gejala.destroy', $item->id) }}">
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
