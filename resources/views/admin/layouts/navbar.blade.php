<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="uploads/users/avt.png" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{ Auth::user()->name }}</span>
                    <span class="account-position">
                        @if (Auth::user()->admin)
                        Quản trị viên
                        @else
                        Người dùng
                        @endif
                    </span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <a href="{{route('user.changeProfile')}}" class="dropdown-item notify-item">
                    <i class="uil-user-circle"></i>
                    <span>Thông tin cá nhân</span>
                </a>

                <!-- item-->
                <a href="{{route('user.changePassword')}}" class="dropdown-item notify-item">
                    <i class="uil-edit"></i>
                    <span>Đổi mật khẩu</span>
                </a>

                <!-- item-->
                <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <i class=" uil-sign-out-alt text-danger"></i>
                    <span class="text-danger">Đăng xuất</span>
                </a>
            </div>
        </li>
    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
</div>