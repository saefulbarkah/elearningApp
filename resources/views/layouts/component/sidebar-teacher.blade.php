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
            <li class="nav-item {{ Request::is('teacher/dashboard') ? 'active' : '' }}">
                <a href="{{ route('teacher-dashboard') }}" class="nav-link nav-toggle"> <i class="fas fa-tachometer-alt"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('teacher/manage-material') ? 'active' : '' }}">
                <a href="{{ route('manage-material') }}" class="nav-link nav-toggle"> <i class="fas fa-book"></i>
                    <span class="title">Kelola Materi</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fas fa-book"></i>
                    <span class="title">Kelola tugas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::is('teacher/manage-task') ? 'active' : '' }}">
                        <a href="{{ route('manage-task') }}" class="nav-link nav-toggle">
                            <span class="title">Daftar tugas</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('teacher/manage-task') ? 'active' : '' }}">
                        <a href="{{ route('manage-task') }}" class="nav-link nav-toggle">
                            <span class="title">Hasil</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
