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
            <li class="nav-item {{ Request::is('absent') ? 'active' : '' }}">
                <a href="{{ route('absent') }}" class="nav-link nav-toggle"> <i class="fas fa-user-check"></i>
                    <span class="title">Absen</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('list-material') ? 'active' : '' }}">
                <a href="{{ route('list-material') }}" class="nav-link nav-toggle"> <i class="fas fa-book"></i>
                    <span class="title">Daftar Materi</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('list-task') ? 'active' : '' }}">
                <a href="{{ route('list-task') }}" class="nav-link nav-toggle"> <i class="fas fa-book"></i>
                    <span class="title">Daftar Tugas</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('filter-teacher') ? 'active' : '' }}">
                <a href="{{ route('filter-teacher') }}" class="nav-link nav-toggle"> <i class="fas fa-search"></i>
                    <span class="title">Filter Pengajar</span>
                </a>
            </li>
        </ul>
    </div>
</div>
