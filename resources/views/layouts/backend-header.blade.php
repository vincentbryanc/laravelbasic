<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header border-right">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <a class="navbar-brand" href="{{ url('/cities') }}">
                <b class="logo-icon">
                    <img src="{{ URL::asset('assets/images/logos/logo-icon.png') }}" alt="GEC-logo" class="dark-logo" />
                </b>
                <span class="logo-text">
                    <h5 class="font-medium text-uppercase mb-0">Laravel Basic Concept</h5>
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-right mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-18"></i></a></li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ URL::asset('assets/images/users/avatar.png') }}" alt="user" class="rounded-circle" width="36">
                        <span class="ml-2 font-medium">{{ Auth::user()->firstname.' '.substr(Auth::user()->middlename,0,1).' '.Auth::user()->lastname }}</span><span class="fas fa-angle-down ml-2"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                            <div class=""><img src="{{ URL::asset('assets/images/users/avatar.png') }}" alt="user" class="rounded" width="80"></div>
                            <div class="ml-2">
                                <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                                <p class=" mb-0 text-muted">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>