@extends('layouts.app', ['pageTitle' => 'Produk'])

@section('content')
	<div class="container">

		<div class="row pt-3">

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

							<button type="button" class="btn mt-3" style="background-color: #E9BE26 !important; border-color: #E9BE26 !important;">
								<i class="ph-eye me-2"></i>
								Lihat Detail
							</button>
						</div>
					</div>
				</div>
			@endfor


			{{-- Pagination --}}
			<div class="d-flex justify-content-center pt-1 mb-1">
				<ul class="pagination pagination-flat">
					<li class="page-item"><a href="#" class="page-link rounded-pill"><i class="ph-arrow-left"></i></a></li>
					<li class="page-item active"><a href="#" class="page-link rounded-pill text-black" style="background-color: #E9BE26 !important; border-color: #E9BE26 !important;">1</a></li>
					<li class="page-item"><a href="#" class="page-link rounded-pill">2</a></li>
					<li class="page-item align-self-center"><span class="mx-2">...</span></li>
					<li class="page-item"><a href="#" class="page-link rounded-pill">14</a></li>
					<li class="page-item"><a href="#" class="page-link rounded-pill">15</a></li>
					<li class="page-item"><a href="#" class="page-link rounded-pill"><i class="ph-arrow-right"></i></a></li>
				</ul>
			</div>
		</div>

	</div>
@endsection