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
                                <a class="nav-link underline-text fs-sm @if($category == 'all' || $category == null) active @endif" aria-current="page" href="{{ route('search', ['term'=>$term, 'category'=>'all']) }}" type="button" aria-controls="all" aria-selected="true">Semua Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link underline-text fs-sm @if($category == 'product') active @endif" href="{{ route('search', ['term'=>$term, 'category'=>'product']) }}" type="button" aria-controls="product" aria-selected="true">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link underline-text fs-sm @if($category == 'destination') active @endif" href="{{ route('search', ['term'=>$term, 'category'=>'destination']) }}" type="button" aria-controls="destination" aria-selected="true">Destinasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="p-2">
                    <h5 class="ps-md-5">Hasil pencarian @if($category == 'product') produk @endif @if($category == 'destination') destinasi @endif <span class="fw-bolder">"{{ $term ?? '' }}"</span></h5>
                    @if (isset($term) && !empty($term) && $items != null && count($items) > 0)     
                        <div class="row">
                            {{-- @for ($i = 1; $i <= 15; $i++)	 --}}
                            @forelse ($items ?? [] as $key => $item)    
                            @php
                                $i = $key+1;
                            @endphp
                            <div class="card card-body">
                                <div class="d-sm-flex align-items-lg-start text-center text-lg-start">
                                    <div class="me-lg-3 mb-3 mb-lg-0">
                                        <a href="https://source.unsplash.com/random/?product/200x200?sig={{ $i }}" data-bs-popup="lightbox">
                                            <img src="https://source.unsplash.com/random/?product/200x200?sig={{ $i }}" width="100" alt="">
                                        </a>
                                    </div>

                                    <div class="flex-fill">
                                        <h6 class="mb-1">
                                            <a href="#" class="text-dark">{{ $item->name }}</a>
                                            <span class="badge bg-transparant border text-body fs-xs ms-3" style="border-color: #4C9732 !important;">{{ $item->category->name }}</span>
                                        </h6>

                                        <ul class="list-inline list-inline-bullet mb-3 mb-lg-2">
                                            <li class="list-inline-item"><a href="#" class="text-muted">By {{ $item->created_by }}</a></li>
                                            <li class="list-inline-item"><a href="#" class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i:s') }}</a></li>
                                        </ul>

                                        <div class="my-1">
                                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                                        </div>
                
                                        <div class="text-muted mb-4">152 viewers</div>

                                        <p class="mb-3">{!! substr(strip_tags($item->desc), 0, 600) !!} ...</p>

                                        <form action="{{ route('detail', ['slug' => $item->slug]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn mt-3" style="background-color: #E9BE26 !important; border-color: #E9BE26 !important;">
                                                <i class="ph-eye me-2"></i>
                                                Lihat Detail
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @empty
                                
                            @endforelse
                            {{-- @endfor --}}
                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center pt-1 mb-1">
                                <ul class="pagination pagination-flat">
                                    @if ($items->currentPage() > 1)
                                    <li class="page-item"><a href="{{ $items->previousPageUrl().'&term='.$term.'&category='.$category }}" class="page-link rounded-pill"><i class="ph-arrow-left"></i></a></li>
                                    @endif

                                    @php
                                    $visibleRange = 3; /* show page number 3 number before after */
                                    $startPage = max(1, $items->currentPage() - floor($visibleRange / 2));
                                    $endPage = min($items->lastPage(), $items->currentPage() + floor($visibleRange / 2));
                                    @endphp

                                    @if ($items->currentPage() - 2 > 0)
                                        <li class="page-item">
                                            <a href="{{ $items->getUrlRange(1, 1)[1].'&term='.$term.'&category='.$category }}" class="page-link rounded-pill">1</a>
                                        </li>
                                        @if ($startPage - 2 > 0)
                                            <li class="page-item">
                                                <a href="#" class="page-link rounded-pill disabled">...</a>
                                            </li>
                                        @endif
                                    @endif

                                    @if($items->lastPage() - 1 > 0) 
                                        @for ($page = $startPage; $page <= $endPage; $page++)
                                        <li class="page-item {{ (int) $page === $items->currentPage() ? 'active' : '' }}"><a href="{{  $items->getUrlRange(1, $items->lastPage())[$page].'&term='.$term.'&category='.$category }}" class="page-link rounded-pill text-black" style="@if((int) $page === $items->currentPage()) background-color: #E9BE26 !important; border-color: #E9BE26 !important;@endif" >{{ $page }}</a></li>
                                        @endfor
                                    @endif

                                    @if ($items->lastPage() - $endPage > 0)
                                        @if ($items->lastPage() - $endPage > 1)
                                            <li class="page-item">
                                                <a href="#" class="page-link rounded-pill disabled">...</a>
                                            </li>
                                        @endif	
                                        <li class="page-item">
                                            <a href="{{ $items->getUrlRange(1, $items->lastPage())[$items->lastPage()].'&term='.$term.'&category='.$category }}" class="page-link rounded-pill">{{ $items->lastPage() }}</a>
                                        </li>
                                    @endif

                                    @if ($items->hasMorePages())
                                    <li class="page-item"><a href="{{ $items->nextPageUrl().'&term='.$term.'&category='.$category }}" class="page-link rounded-pill"><i class="ph-arrow-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="text-center text-muted mt-5">
                            {{-- <i class="ph-hourglass-simple-low fs-1"></i> --}}
                            <div class="mx-5 px-5 fst-italic">Kami <span class="fw-bold">tidak menemukan @if($category == 'product') produk @endif @if($category == 'destination') destinasi @endif apapun</span> yang Anda cari...</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
	</div>
@endsection