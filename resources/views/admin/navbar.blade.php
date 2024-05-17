<div class="navbar navbar-expand-lg navbar-static shadow">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="d-none d-lg-flex">
            <button type="button" class="btn btn-flat btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                <i class="ph-arrows-left-right"></i>
            </button>
        </div>

        <ul class="nav hstack gap-sm-1 flex-row justify-content-end w-lg-100">
            <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <span class="d-none d-lg-inline-block mx-lg-2">Muhammad Ari Anggara</span>
                    <div class="status-indicator-container">
                        <img src="{{ url('assets/demo/face2.jpg') }}" class="w-32px h-32px rounded-pill" alt="">
                        <span class="status-indicator bg-success"></span>
                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">
                        <i class="ph-user-circle me-2"></i>
                        Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="ph-gear me-2"></i>
                        Pengaturan
                    </a>
                    <a href="{{ route('login') }}" class="dropdown-item">
                        <i class="ph-sign-out me-2"></i>
                        Sign out
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>