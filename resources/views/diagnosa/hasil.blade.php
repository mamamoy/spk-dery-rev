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
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('diagnosa.store') }}" method="POST">
                        @csrf

                        <div class="mx-auto text-center col-md-6 mb-4 mt-2">
                            <h5>Nama Pasien</h5>
                            <input class="form-control form-control-lg mt-2 mb-2" style="height: 50px" type="text"
                                id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" value="{{ $pasien }}"
                                data-parsley-required="true" data-parsley-required-message="Nama tidak boleh kosong"
                                disabled="disabled">
                        </div>
                        <input type="text" name="nama_pasien" id="nama_pasien" value="{{ $pasien }}" hidden>
                        @foreach ($hasil as $item)
                            <input type="hidden" name="penyakit_id[]" id="penyakit_id" value="{{$item[0]->id}}">
                        @endforeach

                        @if(empty($hasil))
                        <div class="d-flex align-items-center justify-content-center" style="height:200px">
                            <h3 class="text-center">Penyakit tidak ditemukan. Silahkan ke puskesmas/rumah sakit terdekat.</h3>
                        </div>
                        @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">KD-Tumbuh Kembang</th>
                                    <th class="text-center">Definisi</th>
                                    <th class="text-center">Solusi Pencegahan</th>
                                </tr>
                            </thead>
                            <tbody style="height: 300px">
                                @foreach ($hasil as $item)
                                <tr>
                                    <td class="align-top text-center">{{ $item[0]->kode }} - {{ $item[0]->nama_penyakit }}</td>
                                    <td class="align-top text-center">{{ $item[0]->definisi }}</td>
                                    <td class="align-top text-center">{{ $item[0]->solusi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            
                    @endif
                        <div class="row">
                            <div class="d-flex justify-content-evenly">
                                @if (empty($hasil))
                                @else
                                <button class="btn btn-outline-success" type="submit">Simpan Diagnosa</button>
                                @endif
                                <a class="btn btn-outline-secondary" href="{{route('diagnosa.index')}}">Diagnosa Kembali</a>
                            </div>
                        </div>
                    </form>
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
