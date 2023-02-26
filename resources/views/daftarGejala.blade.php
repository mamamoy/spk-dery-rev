@extends('layout.logreg')

@section('title')
    <title>{{ $title }} | SPDTK</title>
@endsection

@section('content')
<div class="content-wrapper container">
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
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">KD-Gejala</th>
                                <th class="text-center">Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($isi as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->kode_gejala }}</td>
                                    <td class="text-center">{{ $item->nama_gejala }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
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
