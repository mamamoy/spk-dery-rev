@extends('layout.logreg')

@section('content')
        <div class="content-wrapper container">

            <div class="page-heading">
                <span class="fw-bold fs-4">{{ $title }}</span>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <form action="" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Nama Lengkap" value="{{ old('name') }}">
                                                    @error('name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="tempat">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat" id="tempat"
                                                    placeholder="Tempat Lahir" value="{{ old('tempat') }}">
                                                    @error('tempat')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username"
                                                    id="username" placeholder="Username" value="{{ old('username') }}">
                                                    @error('username')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label for="tanggal">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal"
                                                    id="tanggal" value="{{ old('tanggal') }}">
                                                    @error('tanggal')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="kelamin">Jenis Kelamin</label>
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
                                            <div class="form-group mb-4">
                                                <label for="password">Password</label>
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
                                        {{-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="role">User</label>
                                                <select name="role" id="role" class="form-select">
                                                    <option value="0" selected>Pasien</option>
                                                </select>
                                                @error('role')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror 
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center gap-5">
                                <button type="submit" class="btn btn-outline-success">Simpan</button>
                                <a href="/" class="btn btn-outline-danger">Batal</a>
                            </div>
                        </form>
                    </div>

                </section>
            </div>

        </div>
@endsection


