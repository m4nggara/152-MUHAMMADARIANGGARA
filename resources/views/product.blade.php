@extends('layouts.app', ['pageTitle' => 'Produk'])

@section('content')
	<div class="container">

		<div class="row pt-3">

			{{-- @for ($i = 1; $i <= 15; $i++)	
				<div class="card card-body">
					<div class="d-sm-flex align-items-lg-start text-center text-lg-start">
						<div class="me-lg-3 mb-3 mb-lg-0">
							<a href="https://source.unsplash.com/random/?product/200x200?sig={{ $i }}" data-bs-popup="lightbox">
								<img src="https://source.unsplash.com/random/?product/200x200?sig={{ $i }}" width="100" alt="">
							</a>
						</div>

						<div class="flex-fill">
							<h6 class="mb-1">
								<a href="#" style="color: #4C9732 !important;">Produk {{ $i }}</a>
							</h6>

							<ul class="list-inline list-inline-bullet mb-3 mb-lg-2">
								<li class="list-inline-item"><a href="#" class="text-muted">By Admin</a></li>
								<li class="list-inline-item"><a href="#" class="text-muted">{{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</a></li>
							</ul>

							<p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis dolore molestiae tempore accusamus, velit tenetur libero, excepturi fugit perferendis incidunt unde assumenda iure rem debitis est placeat qui vel alias?</p>

							<ul class="list-inline list-inline-bullet mb-0">
								<li class="list-inline-item">Produk dari <a href="#" style="color: #4C9732 !important;">Produsen {{ $i }}</a></li>
								<li class="list-inline-item">Email : <a href="mailto:hi.manggara@Gmail.com" class="text-muted">hi.manggara@gmail.com</a></li>
							</ul>
						</div>

						<div class="flex-shrink-0 text-center mt-3 mt-lg-0 ms-lg-3">

							<div class="my-1">
								<i class="ph-star fs-base lh-base align-top text-warning"></i>
								<i class="ph-star fs-base lh-base align-top text-warning"></i>
								<i class="ph-star fs-base lh-base align-top text-warning"></i>
								<i class="ph-star fs-base lh-base align-top text-warning"></i>
								<i class="ph-star fs-base lh-base align-top text-warning"></i>
							</div>

							<div class="text-muted">152 reviews</div>

							<form action="{{ route('detail', ['slug' => 'Produk ' . $i]) }}" method="post">
								@csrf
								<button type="submit" class="btn mt-3" style="background-color: #E9BE26 !important; border-color: #E9BE26 !important;">
									<i class="ph-eye me-2"></i>
									Lihat Detail
								</button>
							</form>
						</div>
					</div>
				</div>
			@endfor --}}

			@forelse ($product as $i => $item)
			<div class="card card-body">
				<div class="d-sm-flex align-items-lg-start text-center text-lg-start">
					<div class="me-lg-3 mb-3 mb-lg-0">
						@php
							$urlImg = $item->img_path_banner;
							if(Storage::disk('public')->exists($urlImg)) {
								$urlImg = Storage::disk('public')->url($urlImg);
							}
						@endphp
						<a href="{{$urlImg}}" data-bs-popup="lightbox">
							<img src="{{$urlImg}}" width="100" alt="">
						</a>
					</div>

					<div class="flex-fill">
						<h6 class="mb-1">
							<a href="#" style="color: #4C9732 !important;">{{ $item->name }}</a>
						</h6>

						<ul class="list-inline list-inline-bullet mb-3 mb-lg-2 text-muted">
							<li class="list-inline-item"><a href="#" class="text-muted">By Admin</a></li>
							<li class="list-inline-item"><a href="#" class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i:s') }}</a></li>
						</ul>

						<p class="mb-3 text-muted">
							{!! substr(strip_tags($item->desc), 0, 600) !!} ...
						</p>

						<ul class="list-inline list-inline-bullet mb-0 text-muted">
							<li class="list-inline-item">Produk dari <a href="" style="color: #4C9732 !important;">{{ $item->owner }}</a></li>
							<li class="list-inline-item">Kontak : <a href="tel:{{ $item->phone }}" class="text-muted"><i class="ph-phone mx-1"></i>{{ $item->phone }}</a><a href="mailto:{{ $item->email }}" class="text-muted"><i class="ph-envelope mx-1"></i>{{ $item->email }}</a></li>
						</ul>
					</div>

					<div class="flex-shrink-0 text-center mt-3 mt-lg-0 ms-lg-3">

						@include('viewer', ['item' => $item, 'i' => $i, 'class' => 'text-muted'])

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
			<div class="row col-lg-6 mx-auto">
				<div class="alert bg-warning text-white alert-icon-start alert-dismissible fade show border-0">
					<span class="alert-icon bg-black bg-opacity-20">
						<i class="ph-warning-circle"></i>
					</span>
					<span class="fw-semibold">Oops!</span> Sayangnya <a href="#" class="alert-link text-reset">daftar produk</a>, tidak ditemukan saat ini.
					{{-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button> --}}
				</div>
			</div>
			@endforelse


			{{-- Pagination --}}
			<div class="d-flex justify-content-center pt-1 mb-1">
				<ul class="pagination pagination-flat">
					@if ($product->currentPage() > 1)
					<li class="page-item"><a href="{{ $product->previousPageUrl() }}" class="page-link rounded-pill"><i class="ph-arrow-left"></i></a></li>
					@endif

					@php
					$visibleRange = 3; /* show page number 3 number before after */
					$startPage = max(1, $product->currentPage() - floor($visibleRange / 2));
					$endPage = min($product->lastPage(), $product->currentPage() + floor($visibleRange / 2));
					@endphp

					@if ($product->currentPage() - 2 > 0)
						<li class="page-item">
							<a href="{{ $product->getUrlRange(1, 1)[1] }}" class="page-link rounded-pill">1</a>
						</li>
						@if ($startPage - 2 > 0)
							<li class="page-item">
								<a href="#" class="page-link rounded-pill disabled">...</a>
							</li>
						@endif
					@endif

					@if($product->lastPage() - 1 > 0) 
						@for ($page = $startPage; $page <= $endPage; $page++)
						<li class="page-item {{ (int) $page === $product->currentPage() ? 'active' : '' }}"><a href="{{  $product->getUrlRange(1, $product->lastPage())[$page] }}" class="page-link rounded-pill text-black" style="@if((int) $page === $product->currentPage()) background-color: #E9BE26 !important; border-color: #E9BE26 !important;@endif" >{{ $page }}</a></li>
						@endfor
					@endif

					@if ($product->lastPage() - $endPage > 0)
						@if ($product->lastPage() - $endPage > 1)
							<li class="page-item">
								<a href="#" class="page-link rounded-pill disabled">...</a>
							</li>
						@endif	
						<li class="page-item">
							<a href="{{ $product->getUrlRange(1, $product->lastPage())[$product->lastPage()] }}" class="page-link rounded-pill">{{ $product->lastPage() }}</a>
						</li>
					@endif

					@if ($product->hasMorePages())
					<li class="page-item"><a href="{{ $product->nextPageUrl() }}" class="page-link rounded-pill"><i class="ph-arrow-right"></i></a></li>
					@endif
				</ul>
			</div>
		</div>

	</div>
@endsection