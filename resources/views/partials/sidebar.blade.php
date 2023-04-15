<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                    <div class="user-menu d-flex align-self-center">
                        <div class="user-img d-flex align-items-center me-4">
                            <div class="avatar avatar-xl">
                                <img style="height: 60px" src="{{asset('dist/assets/images/faces/1.jpg')}}">
                            </div>
                        </div>
                        <div class="user-name mt-2">
                            <h6 class="mb-0 text-gray-600 name">{{Auth::user()->name}}</h6>
                            <p class="mb-0 text-sm text-gray-600 role">@if(Auth::user()->role== 1)
                                Admin
                            @else
                                Pasien
                            @endif</p>
                        </div>
                    </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                @auth
                    @if(Auth::user()->role == 1)
                        <li class="sidebar-item  ">
                            <a href="{{route('dashboard.index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{route('diagnosa.index')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>Diagnosa</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{route('diagnosa.showDiagnosa')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>History Diagnosa</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{route('tumbuh-kembang.index')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>Tumbuh Kembang</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{route('gejala.index')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>Gejala</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{route('relasi.index')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>Basis Pengetahuan</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{route('pohon-keputusan.index')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>Pohon Keputusan</span>
                            </a>
                        </li>
        
                        <li class="sidebar-title">Pengaturan</li>
        
                        <li class="sidebar-item  ">
                            <a href="{{route('user-list.index')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="/keluar" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    @else()
                        <li class="sidebar-item  ">
                            <a href="{{route('dashboard.index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{route('diagnosa.index')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>Diagnosa</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{route('diagnosa.showDiagnosa')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>History Diagnosa</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Pengaturan</li>
                        <li class="sidebar-item  ">
                            <a href="/keluar" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    @endcan
                @endauth


            </ul>
        </div>
    </div>
</div>