'<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark profile-dd" href="javascript:void(0)" aria-expanded="false">
                        <img src="{{ URL::asset('assets/images/users/avatar.png') }}" class="rounded-circle ml-2" width="30">
                        <span class="hide-menu">{{ Auth::user()->name }} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidebar-link">
                                <i class="fas fa-power-off"></i>
                                <span class="hide-menu"> Logout </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/cities') }}" aria-expanded="false">
                        <i class="mdi mdi-city"></i>
                        <span class="hide-menu">Cities</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users') }}" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>