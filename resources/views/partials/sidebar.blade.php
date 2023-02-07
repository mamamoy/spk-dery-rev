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
                            <h6 class="mb-0 text-gray-600">John Ducky</h6>
                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
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

                <li class="sidebar-item  ">
                    <a href="/" class='sidebar-link'>
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

                <li class="sidebar-title">Pengaturan</li>

                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="fa-fw select-all fas"></i>
                        <span>User</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="fa-fw select-all fas"></i>
                        <span>Keluar</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>