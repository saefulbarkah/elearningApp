<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link text-center">
        <span class="brand-text font-weight-light">E-learning App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('manage-teacher') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            kelola Pengajar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage-student') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            kelola Siswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage-subject') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Kelola mata pelajaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage-schedule') }}" class="nav-link">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Jadwal mata pelajaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage-announcement') }}" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Pengumuman
                        </p>
                    </a>
                </li>
                @endrole

                @role('teacher')
                <li class="nav-item">
                    <a href="{{ route('manage-material') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Kelola Materi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage-task') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Kelola Tugas
                        </p>
                    </a>
                </li>
                @endrole

                @role('student')
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-scan"></i>
                        <p>
                            Absen
                        </p>
                    </a>
                </li>
                @endrole
                @role('teacher|student')
                <li class="nav-item">
                    <a href="{{ route('filter-student') }}" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Filter siswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('filter-teacher') }}" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Filter pengajar
                        </p>
                    </a>
                </li>
                @endrole
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
