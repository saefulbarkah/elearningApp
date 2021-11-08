<div class="sidemenu-container navbar-collapse collapse fixed-menu">
    <div id="remove-scroll" class="left-sidemenu">
        <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="sidebar-user-panel">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('assets/img/dp.jpg') }}" class="img-circle user-img-circle"
                            alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p> {{ auth()->user()->name }}</p>
                        <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
                                Online</span></a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link nav-toggle"> <i class="fas fa-tachometer-alt"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/manage-student*') ? 'active' : '' }}">
                <a href="{{ route('manage-student') }}" class="nav-link nav-toggle"> <i class="fas fa-users"></i>
                    <span class="title">Kelola Data Siswa</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/manage-teacher*') ? 'active' : '' }}">
                <a href="{{ route('manage-teacher') }}" class="nav-link nav-toggle"> <i class="fas fa-users"></i>
                    <span class="title">Kelola Data Pengajar</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/manage-major*') ? 'active' : '' }}">
                <a href="{{ route('manage-major') }}" class="nav-link nav-toggle"> <i class="fas fa-users"></i>
                    <span class="title">Kelola Data Jurusan</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/manage-class*') ? 'active' : '' }}">
                <a href="{{ route('manage-class') }}" class="nav-link nav-toggle"> <i class="fas fa-users"></i>
                    <span class="title">Kelola Data Kelas</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/manage-subject*') ? 'active' : '' }}">
                <a href="{{ route('manage-subject') }}" class="nav-link nav-toggle"> <i class="fas fa-book"></i>
                    <span class="title">Kelola Mata Pelajaran</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/manage-announcement*') ? 'active' : '' }}">
                <a href="{{ route('manage-announcement') }}" class="nav-link nav-toggle"> <i
                        class="fas fa-bullhorn"></i>
                    <span class="title">Kelola Pengumuman</span>
                </a>
            </li>
        </ul>
    </div>
</div>
