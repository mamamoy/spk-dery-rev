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
                <div class="card-body">
                    <form action="{{ route('diagnosa.hasil') }}" method="POST" data-parsley-validate>
                        @csrf

                        {{-- <div class="mx-auto text-center col-md-6 mb-4">
                            <h5>Nama Pasien</h5>
                            <input class="form-control form-control-lg mt-2 mb-2" style="height: 50px" type="text" id="nama_pasien" name="nama_pasien"
                            placeholder="Nama Pasien" value="{{ old('nama_pasien') }}" data-parsley-required="true" data-parsley-required-message="Nama tidak boleh kosong">
                        </div> --}}


                        <div class="card-header">
                            <h4 class="card-title text-center">Data Pasien</h4>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="form-group mb-4">
                                        <label for="nama_pasien">Nama Pasien</label>
                                        <input class="form-control form-control-lg mt-2 mb-2" style="height: 50px"
                                            type="text" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien"
                                            value="{{ old('nama_pasien') }}" data-parsley-required="true"
                                            data-parsley-required-message="Nama tidak boleh kosong">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="tLahir">Tanggal Lahir</label>
                                        <input class="form-control form-control-lg mt-2 mb-2" style="height: 50px"
                                            type="date" id="tLahir" name="tLahir" value="{{ old('tLahir') }}"
                                            data-parsley-required="true"
                                            data-parsley-required-message="Tanggal lahir tidak boleh kosong">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group mb-4">
                                        <label for="telp">Nomor Telepon</label>
                                        <input class="form-control form-control-lg mt-2 mb-2" style="height: 50px"
                                            type="text" id="telp" name="telp" placeholder="Nomor Telepon"
                                            value="{{ old('telp') }}" data-parsley-required="true"
                                            data-parsley-type="number"
                                            data-parsley-required-message="Nomor telepon tidak boleh kosong">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="alamat">Alamat</label>
                                        <input class="form-control form-control-lg mt-2 mb-2" style="height: 50px"
                                            type="text" id="alamat" name="alamat" placeholder="Alamat Pasien"
                                            value="{{ old('alamat') }}" data-parsley-required="true"
                                            data-parsley-required-message="Alamat tidak boleh kosong">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto text-center col-md-12 mt-4">
                            <h5>{{ $comment }}</h5>
                            <div class="mt-4">
                                <div class="card widget-todo ">
                                    <div class="card-body px-0 py-1">
                                        <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                                            <div class="row">

                                                @foreach ($isi as $gejala)
                                                    <div class="col-6">
                                                        <li class="widget-todo-item">
                                                            <div
                                                                class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                                <div
                                                                    class="widget-todo-title-area d-flex align-items-center">
                                                                    <div class="checkbox checkbox-shadow">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="gejala[]" value="{{ $gejala->id }}"
                                                                            id="gejala">
                                                                        <label for="gejala"></label>
                                                                    </div>
                                                                    <span
                                                                        class="widget-todo-title ml-50">{{ $gejala->id }}
                                                                        -
                                                                        {{ $gejala->nama_gejala }}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mx-auto text-center col-md-6 mt-4">
                            <button id="success" type="submit" class="btn btn-outline-primary ml-1"
                                data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Proses Diagnosa</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/extensions/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/pages/ui-todolist.js') }}"></script>
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
