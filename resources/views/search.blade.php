@extends('layouts.app', ['pageTitle' => 'Temukan produk UMKM dan destinasi wisata yang belum terjamah'])

@section('content')
	<div class="container pt-3">
		<div class="row gy-1 gy-md-0 g-md-3">
            <div class="col-md-4">
                <div class="card card-body p-2 pt-3 pb-5 bg-white rounded text-center">
                    <h6>Filter Pencarian</h6>
                    <div class="d-flex justify-content-center mt-3">
                        <ul class="nav flex-column text-start">
                            <li class="nav-item">
                                <a class="nav-link underline-text fs-sm active" aria-current="page" href="#" data-bs-toggle="tab" data-bs-target="#all-search" type="button" role="tab" aria-controls="all" aria-selected="true">Semua Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link underline-text fs-sm" href="#" data-bs-toggle="tab" data-bs-target="#product-search" type="button" role="tab" aria-controls="product" aria-selected="true">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link underline-text fs-sm" href="#" data-bs-toggle="tab" data-bs-target="#destination-search" type="button" role="tab" aria-controls="destination" aria-selected="true">Destinasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="p-2">
                    <h5 class="ps-md-5">Hasil pencarian <span class="fw-bolder">"{{ $term ?? '' }}"</span></h5>
                    @if (isset($term) && !empty($term))     
                        <div class="row">
                            @for ($i = 1; $i <= 15; $i++)	
                                <div class="card card-body">
                                    <div class="d-sm-flex align-items-lg-start text-center text-lg-start">
                                        <div class="me-lg-3 mb-3 mb-lg-0">
                                            <a href="https://source.unsplash.com/random/?product/200x200?sig={{ $i }}" data-bs-popup="lightbox">
                                                <img src="https://source.unsplash.com/random/?product/200x200?sig={{ $i }}" width="100" alt="">
                                            </a>
                                        </div>

                                        <div class="flex-fill">
                                            <h6 class="mb-1">
                                                <a href="#" class="text-dark">Pencarian {{ $i }}</a>
                                                <span class="badge bg-transparant border text-body fs-xs ms-3" style="border-color: #4C9732 !important;">Produk</span>
                                            </h6>

                                            <ul class="list-inline list-inline-bullet mb-3 mb-lg-2">
                                                <li class="list-inline-item"><a href="#" class="text-muted">By Admin</a></li>
                                                <li class="list-inline-item"><a href="#" class="text-muted">{{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</a></li>
                                            </ul>

                                            <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis dolore molestiae tempore accusamus, velit tenetur libero, excepturi fugit perferendis incidunt unde assumenda iure rem debitis est placeat qui vel alias?</p>

                                            <form action="{{ route('detail', ['slug' => 'Pencarian ' . $i]) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn mt-3" style="background-color: #E9BE26 !important; border-color: #E9BE26 !important;">
                                                    <i class="ph-eye me-2"></i>
                                                    Lihat Detail
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    @else
                        <div class="text-center text-muted mt-5">
                            <i class="ph-hourglass-simple-low fs-1"></i>
                            <div class="mx-5 px-5 fst-italic">Kami <span class="fw-bold">tidak menemukan apapun</span> yang Anda cari...</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
	</div>
@endsection