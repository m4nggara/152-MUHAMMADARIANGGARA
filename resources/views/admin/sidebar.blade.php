<div class="sidebar sidebar-main sidebar-expand-lg bg-white @yield('sidebar-collapse')">

    <div class="sidebar-section bg-opacity-10 border-bottom border-bottom-black border-opacity-10">
        <div class="sidebar-logo d-flex justify-content-center align-items-center">
			<h6 class="sidebar-resize-hide flex-grow-1 my-auto fs-base text-muted d-none d-lg-inline">Menu</h6>
            <a href="{{ route('admin.dashboard') }}" class="d-inline-flex d-lg-none align-items-center py-2">
                <img src="{{ url('assets/images/logo_icon.svg') }}" class="sidebar-logo-icon" alt="">
                <img src="{{ url('assets/images/logo_text_dark2.svg') }}" class="sidebar-resize-hide ms-1 pt-1" height="18" alt="">
            </a>

            <div class="mx-auto">
                <button type="button" class="btn btn-flat btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                    <i class="ph-arrows-left-right"></i>
                </button>
            </div>

            <div class="sidebar-resize-hide ms-auto">
                <button type="button" class="btn btn-flat btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                    <i class="ph-x"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="sidebar-content">

        {{-- menu --}}
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide d-lg-none d-flex">Menu</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @if(Route::currentRouteName() == 'admin.dashboard') active @endif">
                        <i class="ph-house"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                @php
                    $itemsRes = ['admin.items.index','admin.items.create','admin.items.edit'];
                    $categoriesRes = ['admin.categories.index','admin.categories.create','admin.categories.edit'];
                    $usersRes = ['admin.users.index','admin.users.create','admin.users.edit'];
                    $rolesRes = ['admin.roles.index','admin.roles.create','admin.roles.edit'];
                    $sourceMasterData = array_merge($rolesRes, $usersRes, $categoriesRes, $itemsRes);
                @endphp
                <li class="nav-item nav-item-submenu @if(\App\Helpers\Helper::isNodeMenu(Route::currentRouteName(), $sourceMasterData)) nav-item-open @endif">
                    <a href="#" class="nav-link">
                        <i class="ph-database"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="nav-group-sub collapse @if(\App\Helpers\Helper::isNodeMenu(Route::currentRouteName(), $sourceMasterData)) show @endif">
                        <li class="nav-item"><a href="{{ route('admin.items.index') }}" class="nav-link @if(\App\Helpers\Helper::isNodeMenu(Route::currentRouteName(), $itemsRes)) active @endif">Data Item</a></li>
                        <li class="nav-item"><a href="{{ route('admin.categories.index') }}" class="nav-link @if(\App\Helpers\Helper::isNodeMenu(Route::currentRouteName(), $categoriesRes)) active @endif">Data Kategori</a></li>
                        <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link @if(\App\Helpers\Helper::isNodeMenu(Route::currentRouteName(), $usersRes)) active @endif">Data Pengguna</a></li>
                        <li class="nav-item d-none"><a href="{{ route('admin.roles.index') }}" class="nav-link @if(\App\Helpers\Helper::isNodeMenu(Route::currentRouteName(), $rolesRes)) active @endif">Data Role</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>

    </div>

    <div class="alert bg-main bg-opacity-10 sidebar-resize-hide rounded p-3 m-3">
        <a href="{{ route('home') }}" class="d-inline-flex align-items-center text-dark" data-color-theme="dark">
            Goto App
            <i class="ph-arrow-circle-right ms-2"></i>
        </a>
    </div>

</div>