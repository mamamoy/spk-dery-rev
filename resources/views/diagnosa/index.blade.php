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
        {{-- <section class="tasks">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card widget-todo">
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">
                                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>Tasks
                            </h4>
                        </div>
                        <div class="card-body px-0 py-1">
                            <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                                <li class="widget-todo-item">
                                    <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                        <div class="widget-todo-title-area d-flex align-items-center">
                                            <div class="checkbox checkbox-shadow">
                                                <input type="checkbox" class="form-check-input" id="checkbox1">
                                                <label for="checkbox1"></label>
                                            </div>
                                            <span class="widget-todo-title ml-50">Add SCSS and JS files if
                                                required</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('diagnosa.hasil') }}" method="POST" data-parsley-validate>
                        @csrf

                        <div class="mx-auto text-center col-md-6 mb-4">
                            <h5>Nama Pasien</h5>
                            <input class="form-control form-control-lg mt-2 mb-2" style="height: 50px" type="text" id="nama_pasien" name="nama_pasien"
                            placeholder="Nama Pasien" value="{{ old('nama_pasien') }}" data-parsley-required="true" data-parsley-required-message="Nama tidak boleh kosong">
                        </div>

                        <div class="mx-auto text-center col-md-6 mt-4">
                            <h5>{{ $comment }}</h5>
                            <div class="overflow-scroll" style="height: 240px">
                                <div class="card widget-todo ">
                                    
                                    <div class="card-body px-0 py-1" >
                                        <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                                            @foreach ($isi as $gejala)
                                            <li class="widget-todo-item">
                                                <div
                                                    class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                    <div class="widget-todo-title-area d-flex align-items-center">
                                                        <div class="checkbox checkbox-shadow">
                                                            <input type="checkbox" class="form-check-input" name="gejala[]"
                                                                value="{{ $gejala->id }}" id="gejala">
                                                            <label for="gejala"></label>
                                                        </div>
                                                        <span class="widget-todo-title ml-50">{{$gejala->id}} - {{ $gejala->nama_gejala }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mx-auto text-center col-md-6 mt-4">
                        <button id="success" type="submit" class="btn btn-outline-primary ml-1" data-bs-dismiss="modal">
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
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js "></script>
    <script src="{{ asset('dist/assets/extensions/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/pages/ui-todolist.js') }}"></script>
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
