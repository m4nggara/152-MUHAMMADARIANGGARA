@extends('layouts.app')

@section('content')
	<div class="container pt-3">
		<div class="row">
            <h4>
                {{ $slug }}
                <span class="badge bg-transparant border text-body fs-xs ms-3" style="border-color: #4C9732 !important;">Produk</span>
            </h3>
            <ul class="list-inline list-inline-bullet mb-3 mb-lg-2 fs-sm">
                <li class="list-inline-item"><a href="#" class="text-muted">By Admin</a></li>
                <li class="list-inline-item"><a href="#" class="text-muted">{{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</a></li>
            </ul>
            <div class="p-4 p-md-5 mb-4" style="background: url('https://source.unsplash.com/random/?product') no-repeat center; background-size: cover; min-height: 300px;"></div>
        </div>
        <div class="row g-3">
            <div class="col-md-8">
                <div class="card card-body">
                    <h6 class="card-title">Deskripsi</h6>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur accusamus similique quam quis, illum adipisci et voluptatum, accusantium beatae sed doloribus voluptas recusandae possimus eligendi id obcaecati magnam, architecto omnis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias nisi quibusdam officia suscipit sint saepe quisquam necessitatibus optio sed. Laboriosam, praesentium eius? Amet suscipit ea odio, fuga sapiente ullam necessitatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Est at iste voluptatem minima deleniti hic. Consectetur est iusto ut velit fugiat recusandae architecto in illum placeat ratione ipsum, ea quae!
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body">
                    <h6 class="card-title">Kontak dan Lokasi</h6>
                    <ul class="nav flex-column">
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="ph-phone me-2"></i>
								085295559310
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="ph-envelope me-2"></i>
								hi.manggara@gmail.com
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="ph-house-line me-2"></i>
								Jl. Kenangan No.152 Kota Cimahi
							</a>
						</li>
					</ul>
                </div>
            </div>
        </div>
	</div>
@endsection