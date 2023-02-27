<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')

    <link rel="stylesheet" href="{{ asset('dist/assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('dist/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dist/assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app-dark.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/extensions/choices.js/public/assets/styles/choices.css')}}">

    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('dist/assets/css/shared/iconly.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/css/pages/fontawesome.css')}}">

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
                                                            <a href="/daftar-gejala"
                                                                class='submenu-link'>Gejala</a>
                                                        </li>

                                                        <li class="submenu-item  ">
                                                            <a href="/daftar-penyakit"
                                                                class='submenu-link'>Penyakit</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{route('home.tentang')}}" class='menu-link'>
                                                <span class="fw-bold">Tentang</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        @auth
                            <ul id="nav1" class="navbar-nav">
                                <li class="nav-item">
                                    <form action="/logout" method="post">
                                        @csrf
                                       <button type="submit" class="btn btn-primary">Logout</button>
                                    </form>
                                </li>
                            </ul>
                            @else
                        <div class="header-top-right">

                            <div>
                                <a class="fw-bold" href="{{ route('daftar.index') }}">Pendaftaran</a>
                            </div>

                            <a href="{{route('masuk.index')}}" class="btn btn-sm btn-primary">Masuk</a>

                        </div>
                        @endauth
                    </div>
                </div>
            </header>
        </div>
        <div id="app">
        @yield('content')
        </div>
        <footer>
            <div class="container">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; SIPATUBA</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted by Dery Apriliano Putra</p>
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