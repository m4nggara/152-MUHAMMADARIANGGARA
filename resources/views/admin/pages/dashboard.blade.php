@extends('admin.app')

@section('title')
    - Dashboard
@endsection

@section('content-header')
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <p class="page-title mb-0">
                Selamat datang, <span class="fw-bolder">{{ "Admin" }}</span>
            </p>

            <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>

        
    </div>
</div>
@endsection

@section('content')
<div class="content pt-0">
    <div class="row">
        <div class="col-lg-4">

            <div class="card bg-teal text-white">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="mb-0">{{ $items->count() ?? 0 }}</h3>
                        <span class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto"><i class="ph-cube"></i></span>
                    </div>
                    
                    <div>
                        Total Item
                        <div class="fs-sm opacity-75">Jumlah item aktif : {{ $items->whereNull('deleted_at')->count() ?? 0 }}</div>
                        <div class="fs-sm opacity-75">Total viewer : {{ \App\Models\Viewer::count() ?? 0 }}</div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card bg-pink text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h3 class="mb-0">{{ $items->where('category_id', 1)->count() ?? 0 }}</h3>
                        <span class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto"><i class="ph-shopping-bag-open"></i></span>
                    </div>
                    
                    <div>
                        Total Produk
                        <div class="fs-sm opacity-75">Jumlah produk aktif : {{ $items->where('category_id', 1)->whereNull('deleted_at')->count() ?? 0 }}</div>
                        <div class="fs-sm opacity-75">Jumlah viewer : {{  \App\Models\Viewer::whereHas('item', function($query) {
                            $query->where('category_id', 1);
                        })->count() ?? 0 }}</div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4">

            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h3 class="mb-0">{{ $items->where('category_id', 2)->count() ?? 0 }}</h3>
                        <span class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto"><i class="ph-map-pin-line"></i></span>
                    </div>
                    
                    <div>
                        Total Destinasi
                        <div class="fs-sm opacity-75">Jumlah destinasi aktif : {{ $items->where('category_id', 2)->whereNull('deleted_at')->count() ?? 0 }}</div>
                        <div class="fs-sm opacity-75">Jumlah viewer : {{  \App\Models\Viewer::whereHas('item', function($query) {
                            $query->where('category_id', 2);
                        })->count() ?? 0 }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection