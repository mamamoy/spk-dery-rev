<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Horizontal - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('dist/assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('dist/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dist/assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('dist/assets/css/shared/iconly.css') }}">
<style>
    
</style>

</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('dist/assets/images/logo/favicon.png') }}" class="rounded float-start"
                                alt="...">
                            <span class="fw-bold fs-4">SIPATUBA</span>
                            <nav class="main-navbar ms-5">
                                <div class="container">
                                    <ul>
                                        <li class="menu-item">
                                            <a href="index.html" class='menu-link'>
                                                
                                                <span class="fw-bold">Beranda</span>
                                            </a>
                                        </li>
                                        <li class="menu-item has-sub">
                                            <a href="index.html" class='menu-link'>
                                                <span class="fw-bold">Data Tumbuh Kembang</span>
                                            </a>
                                            <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">

                                        <ul class="submenu-group">
                                            <li
                                                class="submenu-item  ">
                                                <a href="component-carousel.html"
                                                    class='submenu-link'>Carousel</a>

                                                
                                            </li>

                                            <li class="submenu-item  ">
                                                <a href="component-collapse.html"
                                                    class='submenu-link'>Collapse</a>
                                            </li>
                                            
                                            <li class="submenu-item  ">
                                                <a href="component-dropdown.html"
                                                    class='submenu-link'>Dropdown</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                        </li>
                                        <li class="menu-item">
                                            <a href="index.html" class='menu-link'>
                                                <span class="fw-bold">Tentang</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        
                        <div class="header-top-right">

                            <div>
                                <a class="fw-bold" href="">Pendaftaran</a>
                            </div>

                            <button class="btn btn-sm btn-primary">Masuk</button>

                        </div>
                    </div>
                </div>
        </div>

        </header>

        <div class="content-wrapper container">

            <div class="page-heading d-flex align-items-center">
                <span class="fw-bold fs-4">{{ $title }}</span><span
                    class="fw-bold ms-2">{{ $subtitle }}</span>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="row">
                                <div class="d-flex align-items-center justify-content-around">
                                    <img src="{{ asset('dist/assets/images/samples/1.png') }}" class="mt-4 mb-4"
                                        style="height: 330px"></img>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Selamat datang di SIPATUBA</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <p>Sipatuba adalah aplikasi yang dibuat untuk diagnosa gangguan tumbuh kembang pada
                                    balita.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informasi Tumbuh Kembang</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <p>Untuk melihat informasi tumbuh kembang pada balita, klik <a
                                        href="{{ route('tumbuh-kembang.index') }}">link tautan dibawah ini.</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

        <footer>
            <div class="container">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="{{ asset('dist/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dist/assets/js/app.js') }}"></script>
    <script src="{{ asset('dist/assets/js/pages/horizontal-layout.js') }}"></script>

</body>

</html>
