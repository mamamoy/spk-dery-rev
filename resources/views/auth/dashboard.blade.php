@extends('layout.main')

@section('title')
    <title>{{ $title }} | SPDTK</title>
    <style>
        .value {
            font-size: 100px;
            display: block;
            font-weight: bold;
            color: #25396f;
        }
    </style>
@endsection

@section('content')
    <div class="page-heading">
        @if (Auth()->user()->role == 1)
            <h3>Profile Statistics</h3>
        @elseif(Auth()->user()->role == 0)
            <h3>Dashboard</h3>
        @endif
    </div>
    <div class="page-content">
        @if (Auth()->user()->role == 1)
            <section class="section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Gejala</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <div class="row">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <img src="{{ asset('dist/assets/images/samples/1.png') }}"
                                            class="col-lg-6 col-md-6 col-6"></img>
                                        <div class="col-lg-4 col-md-4 col-4 text-center">
                                            <div class="value" akhi="{{ $gejala }}">0</div>
                                            <h5>Gejala</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Tumbuh Kembang</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <div class="row">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <img src="{{ asset('dist/assets/images/samples/2.png') }}"
                                            class="col-lg-6 col-md-6 col-6"></img>
                                        <div class="col-lg-4 col-md-4 col-4 text-center">
                                            <div class="value" akhi="{{ $penyakit }}">0</div>
                                            <h5>Tumbuh Kembang</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Diagnosa</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <img src="{{ asset('dist/assets/images/samples/3.png') }}"
                                            class="col-lg-6 col-md-6 col-6"></img>
                                        <div class="col-lg-4 col-md-4 col-4 text-center">
                                            <div class="value" akhi="{{ $diagnosa }}">0</div>
                                            <h5>Diagnosa</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah User</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <div class="row">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <img src="{{ asset('dist/assets/images/samples/4.png') }}"
                                            class="col-lg-6 col-md-6 col-6"></img>
                                        <div class="col-lg-4 col-md-4 col-4 text-center">
                                            <div class="value" akhi="{{ $user }}">0</div>
                                            <h5>Pengguna</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @elseif(Auth()->user()->role == 0)
            <section class="section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Gejala</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <div class="row">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <img src="{{ asset('dist/assets/images/samples/1.png') }}"
                                            class="col-lg-6 col-md-6 col-6"></img>
                                        <div class="col-lg-4 col-md-4 col-4 text-center">
                                            <div class="value" akhi="{{ $gejala }}">0</div>
                                            <h5>Gejala</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Tumbuh Kembang</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <div class="row">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <img src="{{ asset('dist/assets/images/samples/2.png') }}"
                                            class="col-lg-6 col-md-6 col-6"></img>
                                        <div class="col-lg-4 col-md-4 col-4 text-center">
                                            <div class="value" akhi="{{ $penyakit }}">0</div>
                                            <h5>Tumbuh Kembang</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Diagnosa</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <img src="{{ asset('dist/assets/images/samples/3.png') }}"
                                            class="col-lg-6 col-md-6 col-6"></img>
                                        <div class="col-lg-4 col-md-4 col-4 text-center">
                                            <div class="value" akhi="{{ $diagnosa }}">0</div>
                                            <h5>Diagnosa</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
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

    <script>
        const counters = document.querySelectorAll('.value');
        const speed = 2000;

        counters.forEach(counter => {
            const animate = () => {
                const value = +counter.getAttribute('akhi');
                const data = +counter.innerText;

                const time = value / speed;
                if (data < value) {
                    counter.innerText = Math.ceil(data + time);
                    setTimeout(animate, 1);
                } else {
                    counter.innerText = value;
                }

            }

            animate();
        });
    </script>
@endpush
