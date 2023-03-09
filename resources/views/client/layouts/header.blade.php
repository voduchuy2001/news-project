<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop" style="background-color: #065234">
        <div class="topbar" style="background-color: #065234">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
                    @if (auth()->check())
                    <a href="{{route('home')}}" class="left-topbar-item">
                        Trang quản trị
                    </a>
                    <a class="left-topbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        Đăng xuất
                    </a>
                    @else
                    <a href="{{route('register')}}" class="left-topbar-item">
                        Đăng kí
                    </a>

                    <a href="{{route('login')}}" class="left-topbar-item">
                        Đăng nhập
                    </a>
                    @endif
                </div>

                <div class="right-topbar">
                    <a href="{{$settings->facebook_contact}}" target="_blank">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="{{$settings->instagram_contact}}" target="_blank">
                        <span class="fab fa-instagram"></span>
                    </a>

                    <a href="{{$settings->youtube_channnel}}" target="_blank">
                        <span class="fab fa-youtube"></span>
                    </a>

                    <a href="mailto:{{$settings->email}}">
                        <span class="fa fa-envelope"></span>
                    </a>

                    <a href="callto:{{$settings->phone}}">
                        <span class="fa fa-phone"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile" style="background-color: #065234">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{route('client.home')}}"><img src="{{$settings->logo}}" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile" style="background-color: #065234">
                <li class="left-topbar">
                    @if (auth()->check())
                    <a href="{{route('home')}}" class="left-topbar-item">
                        Trang quản trị
                    </a>
                    <a class="left-topbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        Đăng xuất
                    </a>
                    @else
                    <a href="{{route('register')}}" class="left-topbar-item">
                        Đăng kí
                    </a>

                    <a href="{{route('login')}}" class="left-topbar-item">
                        Đăng nhập
                    </a>
                    @endif
                </li>

                <div class="right-topbar">
                    <a href="{{$settings->fb}}" target="_blank">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="{{$settings->ins}}" target="_blank">
                        <span class="fab fa-instagram"></span>
                    </a>

                    <a href="{{$settings->yt}}" target="_blank">
                        <span class="fab fa-youtube"></span>
                    </a>

                    <a href="mailto:{{$settings->email}}">
                        <span class="fa fa-envelope"></span>
                    </a>

                    <a href="callto:{{$settings->phone}}">
                        <span class="fa fa-phone"></span>
                    </a>
                </div>
            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="{{route('client.home')}}"><img src="{{$settings->logo}}" height="150" width="235" alt="LOGO"></a>
            </div>
        </div>
    </div>
</header>