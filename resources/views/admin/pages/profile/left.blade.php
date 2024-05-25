<div class="card">
    <div class="sidebar-section-body text-center">
        <div class="card-img-actions d-inline-block mb-3">
            {{-- <img class="img-fluid rounded-circle" src="../../../assets/images/demo/users/face11.jpg" width="150" height="150" alt=""> --}}
            <div class="border border-3 border-black rounded-circle mt-3 bg-black">
                <i class="ph-user text-white"  style="font-size: 80px;"></i>
            </div>
            {{-- <div class="card-img-actions-overlay card-img rounded-circle">
                <a href="#" class="btn btn-outline-white btn-icon rounded-pill">
                    <i class="ph-pencil"></i>
                </a>
            </div> --}}
        </div>

        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
        <span class="text-muted">{{ Auth::user()->email }}</span>
    </div>

    <ul class="nav nav-sidebar mt-3">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="ph-house-line me-2"></i>
                Goto App
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="ph-windows-logo me-2"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item-divider"></li>
        <li class="nav-item">
            <a href="{{ route('admin.profile.index') }}" class="nav-link @if(Route::currentRouteName() == 'admin.profile.index') active @endif">
                <i class="ph-user me-2"></i>
                Profil
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.profile.setting') }}" class="nav-link @if(Route::currentRouteName() == 'admin.profile.setting') active @endif">
                <i class="ph-gear me-2"></i>
                Pengaturan
            </a>
        </li>
        <li class="nav-item-divider"></li>
        <li class="nav-item">
            <button class="nav-link border-0 w-100" onclick="$('#form-logout').submit()">
                <i class="ph-sign-out me-2"></i>
                Sign out
            </button>
        </li>

        <form id="form-logout" class="d-none" action="{{ route('logout') }}" method="post">
            @csrf
        </form>
    </ul>
</div>