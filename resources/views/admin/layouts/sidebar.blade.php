<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('home') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="admin/assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="admin/assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">
            @if (Auth::user()->admin)
            <li class="side-nav-title side-nav-item">Quản Trị</li>
            <li class="side-nav-item {{ request()->routeIs('dashboard.*') ? 'menuitem-active' : '' }}">
                <a href="{{route('dashboard')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Thống kê </span>
                </a>
            </li>
            @endif

            <li class="side-nav-title side-nav-item">Quản lý</li>

            @if (Auth::user()->admin)
            <li class="side-nav-item {{ request()->routeIs('user.*') ? 'menuitem-active' : '' }}">
                <a href="{{ route('user.index') }}" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Người dùng </span>
                </a>
            </li>
            @endif

            @if (Auth::user()->admin)
            <li class="side-nav-item {{ request()->routeIs('category.*') ? 'menuitem-active' : '' }}">
                <a href="{{ route('category.index') }}" class="side-nav-link">
                    <i class="uil-bookmark"></i>
                    <span> Danh mục </span>
                </a>
            </li>
            @endif

            @if (Auth::user()->admin)
            <li class="side-nav-item {{ request()->routeIs('tag.*') ? 'menuitem-active' : '' }}">
                <a href="{{ route('tag.index') }}" class="side-nav-link">
                    <i class="uil-tag-alt"></i>
                    <span> Thẻ </span>
                </a>
            </li>
            @endif

            @if (Auth::user()->admin)
            <li class="side-nav-item {{ request()->routeIs('post.*') ? 'menuitem-active' : '' }}">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts"
                    class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span> Bài viết </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('post.index') }}">Danh sách bài viết</a>
                        </li>
                        <li>
                            <a href="{{ route('post.listNoPublished') }}">Bài viết chưa duyệt</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            @if (!Auth::user()->admin)
            <li class="side-nav-item {{ request()->routeIs('post.*') ? 'menuitem-active' : '' }}">
                <a href="{{ route('post.userPost') }}" class="side-nav-link">
                    <i class="uil-book"></i>
                    <span> Bài viết </span>
                </a>
            </li>
            @endif

            @if (Auth::user()->admin)
            <li class="side-nav-item">
                <a href="{{route('setting.index')}}" class="side-nav-link">
                    <i class="uil-cog"></i>
                    <span> Thông tin </span>
                </a>
            </li>
            @endif
        </ul>
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>