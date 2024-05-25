<div class="navbar navbar-expand-lg navbar-static shadow">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="navbar-brand flex-1 flex-lg-0">
            <a href="{{ route('admin.dashboard') }}" class="d-none d-lg-inline-flex align-items-center py-2">
                <img src="{{ url('assets/images/logo_icon.svg') }}" class="sidebar-logo-icon" alt="">
                <img src="{{ url('assets/images/logo_text_dark2.svg') }}" class="sidebar-resize-hide ms-1 pt-1" height="18" alt="">
            </a>
        </div>

        {{-- <div class="d-none d-lg-flex">
            <button type="button" class="btn btn-flat btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                <i class="ph-arrows-left-right"></i>
            </button>
        </div> --}}

        <ul class="nav hstack gap-sm-1 flex-row justify-content-end w-lg-100">
            <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::user()->name }}</span>
                    <div class="status-indicator-container">
                        {{-- <img src="{{ url('assets/demo/face2.jpg') }}" class="w-32px h-32px rounded-pill" alt=""> --}}
                        <div class="w-32px h-32px border border-black rounded-pill text-center">
                            <i class=" ph-user fs-1 "></i>
                        </div>
                        <span class="status-indicator bg-success"></span>
                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('admin.profile.index') }}" class="dropdown-item">
                        <i class="ph-user-circle me-2"></i>
                        Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.profile.setting') }}" class="dropdown-item">
                        <i class="ph-gear me-2"></i>
                        Pengaturan
                    </a>
                    <button class="dropdown-item" onclick="$('#form-logout').submit();">
                        <i class="ph-sign-out me-2"></i>
                        Sign out
                    </button>

                    <form id="form-logout" class="d-none" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>