<div class="page-header-inner ">
    <!-- logo start -->
    <div class="page-logo">
        <a href="">
            <span class="logo-default">E-LEARNING</span> </a>
    </div>
    <!-- logo end -->
    <ul class="nav navbar-nav navbar-left in">
        <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
    </ul>
    <!-- start mobile menu -->
    <a class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
        <span></span>
    </a>
    <!-- end mobile menu -->
    <!-- start header menu -->
    <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
            <!-- start manage user dropdown -->
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" class="img-circle " src="{{ asset('assets/img/dp.jpg') }}" />
                    <span class="username username-hide-on-mobile"> {{ auth()->user()->name }} </span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                    <li>
                        <a href="">
                            <i class="icon-user"></i> Profil </a>
                    </li>
                    <li>
                        <a href="login.html" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="icon-logout"></i> Keluar </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
