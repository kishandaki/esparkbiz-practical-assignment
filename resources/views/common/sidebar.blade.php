<!-- partial:partials/_horizontal-navbar.html -->
<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
                    style="color: black">
                    <h3><b> {{ config('app.name') }}</b></h3>
                </div>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <i class="mdi mdi-account"></i>
                            <span class="nav-profile-name">{{ auth()->user()->name }}</span>
                            <span class="online-status"></span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-exit-to-app text-danger"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation" style="justify-content: flex-start !important;">
                <li class="nav-item {{ request()->is('admin/home') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.home') }}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.users.index') }}">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">Users</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('admin/applications*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.applications.index') }}">
                        <i class="mdi mdi-apps menu-icon"></i>
                        <span class="menu-title">Applications</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</div>
<!-- partial -->
