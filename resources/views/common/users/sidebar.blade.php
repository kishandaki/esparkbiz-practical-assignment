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
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown  d-lg-flex d-none">
                        <a class="" href="{{route('form')}}">
                            <i class="mdi mdi-playlist-plus menu-icon"></i>
                            <span class="menu-title">Apply Form</span>
                        </a>
                    </li>


                    @guest

                        @if (Route::has('login'))
                            <li class="nav-item dropdown d-lg-flex d-none">
                                <a class="" href="{{ route('login') }}">
                                    <i class="mdi mdi-login menu-icon"></i>
                                    <span class="menu-title">{{ __('Login') }}</span>
                                </a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item dropdown d-lg-flex d-none">
                                <a class="" href="{{ route('register') }}">
                                    <i class="mdi mdi-arrow-right-drop-circle menu-icon"></i>
                                    <span class="menu-title">{{ __('Register') }}</span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown  d-lg-flex d-none">
                            <a class="" href="{{ route('admin.home') }}">
                                <i class="mdi mdi-home menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                id="profileDropdown">
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
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- partial -->
