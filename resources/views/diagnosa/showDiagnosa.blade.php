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
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Nama Pasien</th>
                                <th class="text-center">Diagnosis</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diagnosa as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">{{ $item->nama_pasien }}</td>
                                    @php
                                        $penyakit_ids = [];
                                        $penyakit = str_replace('[', '', $item->penyakit_id);
                                        $penyakit_ids = array_merge($penyakit_ids, explode(',', $penyakit));
                                    @endphp
                                    <td class="text-center" style="max-width: 200px">
                                        @foreach (\App\Models\TKModel::whereIn('id', $penyakit_ids)->get() as $penyakit)
                                            @if ($loop->iteration != 1)
                                                ,
                                            @endif
                                            {{ $penyakit->nama_penyakit }}
                                        @endforeach
                                    </td>

                                    <td class="d-flex justify-content-around">
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <a href="/diagnosa/{{ $item->id }}" target="_blank" class="btn btn-sm">
                                                    <span class="fa-fw select-all fas"></span>
                                                </a>
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">Lihat
                                            </dd>
                                        </dl>
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <form method="POST" action="{{ route('diagnosa.destroy', $item->id) }}">
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
