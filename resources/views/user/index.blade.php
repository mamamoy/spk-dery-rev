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
                        Tambah User
                    </button>
                </div>
                <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1"
                    aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
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
                                <h5 class="modal-title text-center">Input User</h5>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <form action="{{ route('user-list.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 row mt-3">
                                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Nama Lengkap" value="{{ old('name') }}">
                                                    @error('name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="tempat" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Lahir" value="{{ old('tempat') }}">
                                                @error('tempat')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username"
                                                            id="username" placeholder="Username" value="{{ old('username') }}">
                                                            @error('username')
                                                            <div class="text-danger">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal"
                                                    id="tanggal" value="{{ old('tanggal') }}">
                                                    @error('tanggal')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select name="kelamin" id="kelamin" class="form-select">
                                                    <option value="l">Laki-laki</option>
                                                    <option value="p">Perempuan</option>
                                                </select>
                                                @error('kelamin')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password"
                                                    id="password" placeholder="Password" value="{{ old('password') }}">
                                                    @error('password')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                        </div>
                                        <input type="hidden" name="role" id="role" value="0">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                </button>
                                <button id="success" type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
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
                                <th class="text-center">Nama</th>
                                <th class="text-center">Tempat Lahir</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $u)
                                <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td class="text-center">{{ $u['name']}}</td>
                                    <td class="text-center">{{ $u['tempat'] }}</td>
                                    <td class="text-center">{{ $u['tanggal'] }}</td>
                                    <td class="text-center">
                                        @if( $u['kelamin'] == "l")
                                            Laki-laki
                                        @else()
                                            Perempuan
                                        @endif
                                    </td>
                                    
                                    <td class="d-flex justify-content-around">
                                        @if(Auth()->user()->id == $u->id)
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                               
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">
                                            </dd>
                                        </dl>
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                              
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">
                                            </dd>
                                        </dl>
                                        @else
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <a href="/user-list/{{ $u->id }}/edit" class="btn btn-sm">
                                                    <span class="fa-fw select-all fas"></span>
                                                </a>
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">Edit
                                            </dd>
                                        </dl>
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <form method="POST" action="{{ route('user-list.destroy', $u->id) }}">
                                                @if(Auth::id() == $u->id)
                                                    <fieldset disabled>
                                                @else
                                                    <fieldset>
                                                @endif
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm">
                                                            <span class="fa-fw select-all fas"></span>
                                                        </button>
                                                    </fieldset>
                                                </form>
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">Hapus
                                            </dd>
                                        </dl>
                                        @endif
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
