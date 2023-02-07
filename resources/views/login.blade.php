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
                                            <a href="{{route('index')}}" class='menu-link'>

                                                <span class="fw-bold">Beranda</span>
                                            </a>
                                        </li>
                                        <li class="menu-item has-sub">
                                            <a href="index.html" class='menu-link'>
                                                <span class="fw-bold">Data Tumbuh Kembang</span>
                                            </a>
                                            <div class="submenu ">
                                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                                <div class="submenu-group-wrapper">

                                                    <ul class="submenu-group">
                                                        <li class="submenu-item  ">
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
                                <a class="fw-bold" href="{{ route('daftar.index') }}">Pendaftaran</a>
                            </div>

                            <a href="{{route('masuk.index')}}" class="btn btn-sm btn-primary">Masuk</a>

                        </div>
                    </div>
                </div>
            </header>
        </div>


        <div class="content-wrapper container">

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
                        <form action="" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header d-flex">
                                    <div class="avatar avatar-lg bg-warning me-3">
                                        <img src="assets/images/faces/1.jpg" alt="" srcset="">
                                    </div>
                                    <div class="mt-2">
                                        <h5>{{$subtitle}}</h5>
                                    </div>
                                </div>
                                <hr class="mb-0 mt-0">
                                <div class="card-body d-flex justify-content-center mt-4 mb-4">
                                    <div class="" style="width: 80%">
                                        <div class="form-group mb-4">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="tempat">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat" id="tempat"
                                                placeholder="Tempat Lahir">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username"
                                                id="username" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center gap-5">
                                <button class="btn btn-outline-success">Simpan</button>
                                <button class="btn btn-outline-danger">Batal</button>
                            </div>
                        </form>
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