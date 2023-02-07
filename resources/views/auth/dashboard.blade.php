@extends('layout.main')

@section('title')
    <title>{{ $title }} | SPDTK</title>
    <style>
        .value {
            font-size: 100px;
            display: block;
            font-weight: bold;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
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
                                    <img src="{{ asset('dist/assets/images/samples/1.png') }}" class="col-lg-6 col-md-6 col-6"></img>
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
                                    <img src="{{ asset('dist/assets/images/samples/2.png') }}" class="col-lg-6 col-md-6 col-6"></img>
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
                            {{-- content --}}
                            <canvas id="bar" style="display: block; width: 337px; height: 168px;"
                                class="chartjs-render-monitor" width="337" height="168"></canvas>
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
                            <canvas id="bar" style="display: block; width: 337px; height: 168px;"
                                class="chartjs-render-monitor" width="337" height="168"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
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
