<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    

    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('dist/assets/css/main/app-dark.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('dist/assets/extensions/choices.js/public/assets/styles/choices.css')}}">

    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/logo.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/logo.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('dist/assets/css/shared/iconly.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/css/pages/fontawesome.css')}}">
<link rel="stylesheet" href="{{asset('dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/assets/css/pages/datatables.css')}}">
<link rel="stylesheet" href="{{asset('dist/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css')}}">
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css " rel="stylesheet"></link>
<link rel="stylesheet" href="{{asset('dist/assets/css/widgets/todo.css')}}">
<link rel="stylesheet" href="{{asset('dist/assets/extensions/dragula/dragula.min.css')}}">

<style>
    .fontawesome-icons {
        text-align: center;
    }

    article dl {
        background-color: rgba(0, 0, 0, .02);
        padding: 20px;
    }

    .fontawesome-icons .the-icon {
        font-size: 24px;
        line-height: 1.2;
    
}
</style>
</head>

<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main" class='layout-navbar'>
            @include('partials.header')
            <div id="main-content">

                @yield('content')

                @include('partials.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset ('dist/assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset ('dist/assets/js/app.js')}}"></script>

    <script src="{{asset('dist/assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
<script src="{{asset('dist/assets/js/pages/form-element-select.js')}}"></script>
<script src="{{asset('dist/assets/extensions/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{asset('dist/assets/js/pages/datatables.js')}}"></script>
<script src="{{asset('dist/assets/extensions/parsleyjs/parsley.min.js')}}"></script>
<script src="{{asset('dist/assets/js/pages/parsley.js')}}"></script>

@stack('scripts')

</body>

</html>
