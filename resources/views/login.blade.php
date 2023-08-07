@extends('layout.logreg')

@section('content')
<div class="content-wrapper container">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
    @endif
    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
    @endif    
    <div class="page-heading">
        <div class="row justify-content-center">
            <div class="col-7">
                <span class="fw-bold fs-4">{{ $title }}</span>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row justify-content-center" >
            <div class="col-7">
                <form action="/masuk" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="avatar avatar-lg me-3">
                                <img src="{{ asset('dist/assets/images/logo/logo.png') }}" alt="" srcset="" style="scale: 90%">
                            </div>
                            <div class="mt-2">
                                <h5>{{$subtitle}}</h5>
                            </div>
                        </div>
                        <hr class="mb-0 mt-0">
                        <div class="card-body d-flex justify-content-center mt-4 mb-4">
                            <div class="" style="width: 80%">
                                    <div class="form-group mb-4">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                                            id="username" placeholder="Username">
                                            @error('username')
                                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password"
                                            id="password" placeholder="Password" value="{{ old('password') }}">
                                            @error('password')
                                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <input type="hidden" name="role" id="role" value="0">

                                    {{-- <div class="form-group">
                                        <label for="role">User</label>
                                        <select name="role" id="role" class="form-select">
                                            <option value="0">Pasien</option>
                                            <option value="1">Admin</option>
                                        </select>
                                        @error('role')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror 
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-5">
                        <button class="btn btn-outline-success">Masuk</button>
                        <a href="/" class="btn btn-outline-danger">Batal</a>
                    </div>
                </form>
            </div>

        </section>
    </div>

</div>
@endsection