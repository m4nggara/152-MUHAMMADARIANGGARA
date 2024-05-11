@extends('layouts.app')

@section('content')
	<div class="container w-100 h-100 text-center">
		<div class="" style="margin-top: 164px;">
			<h1 class="fw-bold" style="font-size: 48px;">Cari Apa ?</h1>
			<div class="navbar bg-transparent border-0 py-1 mb-2">
				<div class="container-fluid">
					<ul class="nav nav-tabs border-bottom-0 align-items-center mx-auto" role="tablist">
						<li class="nav-item">
							<a href="#" class="navbar-nav-link navbar-nav-link-icon nav-search active" id="all-tab-search" data-bs-toggle="tab" data-bs-target="#all-search" type="button" role="tab" aria-controls="all" aria-selected="true">
								<div class="d-flex align-items-center mx-md-1">
									<i class="ph-house"></i>
									<span class="ms-2">Semua Kategori</span>
								</div>
							</a>
						</li>
						<li class="nav-item ms-1">
							<a href="#" class="navbar-nav-link navbar-nav-link-icon nav-search" id="product-tab-search" data-bs-toggle="tab" data-bs-target="#product-search" type="button" role="tab" aria-controls="product" aria-selected="true">
								<div class="d-flex align-items-center mx-md-1">
									<i class="ph-shopping-bag-open"></i>
									<span class="ms-2">Produk</span>
								</div>
							</a>
						</li>
						<li class="nav-item ms-1">
							<a href="#" class="navbar-nav-link navbar-nav-link-icon nav-search" id="destination-tab-search" data-bs-toggle="tab" data-bs-target="#destination-search" type="button" role="tab" aria-controls="destination" aria-selected="true">
								<div class="d-flex align-items-center mx-md-1">
									<i class="ph-map-pin-line"></i>
									<span class="ms-2">Destinasi</span>
								</div>
							</a>
						</li>
					</ul>

				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 mx-auto">
					<div class="input-group">
						<span class="input-group-text bg-white border-end-0">
							<i class="ph-magnifying-glass"></i>
						</span>
						<input type="text" class="form-control border-start-0 border-end-0" placeholder="Masukan pencarian">
						<div class="input-group-text bg-white border-start-0 p-0 p-1">
							<button class="btn btn-sm btn-light border-0 rounded" style="background-color: #E9BE26;" type="button">Cari</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection