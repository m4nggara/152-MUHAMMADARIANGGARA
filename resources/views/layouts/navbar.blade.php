{{-- NAVBAR --}}
<div class="container-fluid navbar navbar-expand-xl navbar-static shadow fixed-top">
    <div class="container">
        <div class="navbar-brand flex-1 flex-xl-0">
            <a href="/" class="d-inline-flex align-items-center">
                <img src="assets/images/logo.svg" alt="" class="h-48px">
            </a>
        </div>

        <div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0 pt-2 pt-xl-0 mt-2 mt-xl-0 flex-0 flex-xl-1">
            <ul class="nav gap-1 justify-content-center flex-nowrap flex-xl-wrap mx-auto">
                <li class="nav-item">
                    <a href="{{ route('discover') }}" class="navbar-nav-link rounded @if(Route::currentRouteName() == 'discover') active @endif">
                        <i class="ph-globe me-2"></i>
                        Jelajahi
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product') }}" class="navbar-nav-link rounded @if(Route::currentRouteName() == 'product') active @endif">
                        <i class="ph-shopping-bag-open me-2"></i>
                        Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('destination') }}" class="navbar-nav-link rounded @if(Route::currentRouteName() == 'destination') active @endif">
                        <i class="ph-map-pin-line me-2"></i>
                        Destinasi
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
{{-- NAVBAREND --}}