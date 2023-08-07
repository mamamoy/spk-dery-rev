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
                                    href="{{ route('user-list.index') }}">{{ $subtitle }}</a></li>
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
                            <h4 class="card-title"><a href="{{ route('user-list.index') }}" class="btn btn-secondary ">
                                    <span class="fa fa-arrow-left"></span> | Kembali
                                </a></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('user-list.update', $user->id) }}" method="POST"
                                    data-parsley-validate>
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-5 col-form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="name Penyakit" value="{{ $user->name }}"
                                                    data-parsley-required="true"
                                                    data-parsley-required-message="Nama tidak boleh kosong">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="username" class="col-sm-5 col-form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    value="{{ $user->username }}" placeholder="Nama Penyakit"
                                                    data-parsley-required="true"
                                                    data-parsley-required-message="Username tidak boleh kosong">
                                                @error('username')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tempat" class="col-sm-5 col-form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat" name="tempat"
                                                    value="{{ $user->tempat }}" placeholder="Nama Penyakit"
                                                    data-parsley-required="true"
                                                    data-parsley-required-message="Tempat Lahir tidak boleh kosong">
                                                @error('tempat')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                    placeholder="tanggal Penyakit" value="{{ $user->tanggal }}"
                                                    data-parsley-required="true"
                                                    data-parsley-required-message="Nama tidak boleh kosong">
                                                @error('tanggal')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kelamin" class="col-sm-5 col-form-label">Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin"
                                                        value="l" id="kelaminL"
                                                        {{ $user->kelamin == 'l' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="kelaminL">Laki-laki</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin"
                                                        value="p" id="kelaminP"
                                                        {{ $user->kelamin == 'p' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="kelaminP">Perempuan</label>
                                                </div>
                                                @error('kelamin')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password" class="col-sm-5 col-form-label">Password</label>
                                                <input type="text" class="form-control" id="password"
                                                    name="password" placeholder="password" value="">

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="isrole" class="  col-sm-5 col-form-label">Role</label>
                                                <select name="is_role" id="">
                                                    <option class="form-control" value="0"
                                                        {{ $user->role == 0 ? 'selected' : '' }}>Pasien</option>
                                                    <option class="form-control" value="1"
                                                        {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                                                </select>

                                            </div>
                                        </div>
                                        <input type="hidden" name="id" id="id"
                                            value="{{ $user->id }}">

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
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
