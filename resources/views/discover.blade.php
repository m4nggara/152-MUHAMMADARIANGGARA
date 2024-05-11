@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
	<div class="p-4 p-md-5 mb-4" style="background-image: url({{ url('assets/demo/cover3.jpg') }})">
		<div class="col-md-6 px-0 text-white fw-bold">
			<h1 class="display-4 fst-italic">Jelajahi <span class="fw-bold text-black">Keindahan</span> dan <span class="fw-bold text-black">Kearifan Lokal</span> <span class="text-nowrap">di Jawa Barat</span></h1>
			<p class="lead my-3 text-white">Temukan pesona tersembunyi Jawa Barat dengan <span class="fw-bold">Tenjo Kampung</span>, platform yang membuka pintu gerbang menuju surga tersembunyi di pedesaan.</p>
		</div>
	</div>
	<div class="container">
		<div class="mb-3">
			<h6 class="mb-0 fw-bold">Produk Lokal Terbaik</h6>
			<span class="text-muted">Rekomendasi produk lokal terbaik.</span>
		</div>

		<div class="row">
			<div class="col-lg-4">

				<div class="card">
					<div class="card-header">
						<h5 class="mb-0"><a href="#" class="text-body">Jalakotek Majalengka</a></h5>
					</div>

					<div class="card-body">
						<div class="ratio ratio-16x9 mb-3">
							<iframe class="rounded" allowfullscreen="" frameborder="0" mozallowfullscreen="" src="https://www.youtube.com/embed/vsvoSOZvl3M" webkitallowfullscreen=""></iframe>
						</div>

						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae temporibus doloremque laborum rem! Fugiat aliquam perspiciatis quaerat tempora? Voluptatum facilis dolore rem voluptas, aut amet architecto pariatur aliquid dolor id?. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque illo aperiam facere voluptatibus odit error cumque autem pariatur sed eveniet dolorem, iure, placeat voluptate mollitia minus? Similique excepturi nihil deserunt?
					</div>

					<div class="card-body d-sm-flex justify-content-sm-between align-items-sm-center pt-0">
						<ul class="list-inline list-inline-bullet text-muted mb-3 mb-sm-0">
							<li class="list-inline-item">By <a href="#" class="text-body">Admin</a></li>
							<li class="list-inline-item">{{ \Carbon\Carbon::now()->format('d F Y') }}</li>
						</ul>

						<a href="#" class="d-inline-flex align-items-center text-body">
							<i class="ph-heart text-pink me-2"></i>
							100
						</a>
					</div>
				</div>

			</div>
			<div class="col-lg-4">

				<div class="card">
					<div class="card-header">
						<h5 class="mb-0"><a href="#" class="text-body">Kopi Jabarana</a></h5>
					</div>

					<div class="card-body">
						<div class="card-img-actions mb-3">
							<img class="card-img img-fluid" src="assets/demo/coffe.png" alt="">
							<div class="card-img-actions-overlay card-img">
								<a href="#" class="btn btn-outline-white btn-icon rounded-pill">
									<i class="ph-link"></i>
								</a>
							</div>
						</div>

						Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, aperiam dolore explicabo consequuntur reiciendis expedita tempore ipsam sequi, dignissimos saepe corporis nostrum adipisci vel consequatur maxime distinctio reprehenderit, a optio? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, fugiat officiis quibusdam possimus culpa non rem officia delectus ipsa.
					</div>

					<div class="card-body d-sm-flex justify-content-sm-between align-items-sm-center pt-0">
						<ul class="list-inline list-inline-bullet text-muted mb-3 mb-sm-0">
							<li class="list-inline-item">By <a href="#" class="text-body">Admin</a></li>
							<li class="list-inline-item">{{ \Carbon\Carbon::now()->format('d F Y') }}</li>
						</ul>

						<a href="#" class="d-inline-flex align-items-center text-body">
							<i class="ph-heart text-pink me-2"></i>
							50
						</a>
					</div>
				</div>
			
			</div>
			
			<div class="col-lg-4">

				<div class="card">
					<div class="card-header">
						<h5 class="mb-0"><a href="#" class="text-body">Gula Aren Raos Cianjur</a></h5>
					</div>

					<div class="card-body">
						<div class="ratio ratio-16x9 mb-3">
							<iframe class="rounded" allowfullscreen="" frameborder="0" mozallowfullscreen="" src="https://www.youtube.com/embed/GgxDAUlCrMk" webkitallowfullscreen=""></iframe>
						</div>

						Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat et ea corporis esse voluptate vitae tempora optio nihil laudantium? Quae beatae labore quidem recusandae! Sed architecto vitae explicabo reprehenderit rerum! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus libero odit ipsam! Totam ipsa laboriosam quod accusamus animi, illum ducimus, itaque esse odio labore asperiores illo odit nesciunt natus blanditiis.
					</div>

					<div class="card-body d-sm-flex justify-content-sm-between align-items-sm-center pt-0">
						<ul class="list-inline list-inline-bullet text-muted mb-3 mb-sm-0">
							<li class="list-inline-item">By <a href="#" class="text-body">Admin</a></li>
							<li class="list-inline-item">{{ \Carbon\Carbon::now()->format('d F Y') }}</li>
						</ul>

						<a href="#" class="d-inline-flex align-items-center text-body">
							<i class="ph-heart text-pink me-2"></i>
							2
						</a>
					</div>
				</div>

			</div>
		</div>

		<div class="mb-3 pt-2">
			<h6 class="mb-0 fw-bold">Destinasi Populer</h6>
			<span class="text-muted">Rekomendasi destinasi populer.</span>
		</div>

		<div class="row">
			<div class="col-lg-4">

				<div class="card">
					<div class="card-header">
						<h5 class="mb-0"><a href="#" class="text-body">Pantai Pangandaran</a></h5>
					</div>

					<div class="card-body">
						<div class="card-img-actions mb-3">
							<img class="card-img img-fluid" src="assets/demo/pangandaran.png" alt="">
							<div class="card-img-actions-overlay card-img">
								<a href="#" class="btn btn-outline-white btn-icon rounded-pill">
									<i class="ph-link"></i>
								</a>
							</div>
						</div>

						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium officia cumque placeat, dicta, maiores corrupti, alias fugit omnis impedit nisi reprehenderit? Placeat minima eligendi, necessitatibus itaque alias cumque libero totam? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat dicta expedita fugiat, totam delectus deleniti commodi illo officiis. Quasi dolorum perspiciatis blanditiis nulla repellendus veniam ipsa excepturi eveniet dignissimos nihil.
					</div>

					<div class="card-body d-sm-flex justify-content-sm-between align-items-sm-center pt-0">
						<ul class="list-inline list-inline-bullet text-muted mb-3 mb-sm-0">
							<li class="list-inline-item">By <a href="#" class="text-body">Admin</a></li>
							<li class="list-inline-item">{{ \Carbon\Carbon::now()->format('d F Y') }}</li>
						</ul>

						<a href="#" class="d-inline-flex align-items-center text-body">
							<i class="ph-heart text-pink me-2"></i>
							100
						</a>
					</div>
				</div>

			</div>
			<div class="col-lg-4">

				<div class="card">
					<div class="card-header">
						<h5 class="mb-0"><a href="#" class="text-body">Mesjid Agung Al-Jabar</a></h5>
					</div>

					<div class="card-body">
						<div class="card-img-actions mb-3">
							<img class="card-img img-fluid" src="assets/demo/aljabar.png" alt="">
							<div class="card-img-actions-overlay card-img">
								<a href="#" class="btn btn-outline-white btn-icon rounded-pill">
									<i class="ph-link"></i>
								</a>
							</div>
						</div>

						Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, aperiam dolore explicabo consequuntur reiciendis expedita tempore ipsam sequi, dignissimos saepe corporis nostrum adipisci vel consequatur maxime distinctio reprehenderit, a optio? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, fugiat officiis quibusdam possimus culpa non rem officia delectus ipsa. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius enim magnam ab maxime dolorum optio dignissimos, quaerat rem, tempora harum architecto facilis impedit aliquam perferendis nostrum molestias, dolores recusandae nemo.
					</div>

					<div class="card-body d-sm-flex justify-content-sm-between align-items-sm-center pt-0">
						<ul class="list-inline list-inline-bullet text-muted mb-3 mb-sm-0">
							<li class="list-inline-item">By <a href="#" class="text-body">Admin</a></li>
							<li class="list-inline-item">{{ \Carbon\Carbon::now()->format('d F Y') }}</li>
						</ul>

						<a href="#" class="d-inline-flex align-items-center text-body">
							<i class="ph-heart text-pink me-2"></i>
							50
						</a>
					</div>
				</div>
			
			</div>
			
			<div class="col-lg-4">

				<div class="card">
					<div class="card-header">
						<h5 class="mb-0"><a href="#" class="text-body">Kereta Cepat Bandung Jakarta</a></h5>
					</div>

					<div class="card-body">
						<div class="card-img-actions mb-3">
							<img class="card-img img-fluid" src="assets/demo/kcic.png" alt="">
							<div class="card-img-actions-overlay card-img">
								<a href="#" class="btn btn-outline-white btn-icon rounded-pill">
									<i class="ph-link"></i>
								</a>
							</div>
						</div>

						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis nobis, illum ratione voluptatem at et maxime non quia illo blanditiis totam earum soluta fugiat explicabo obcaecati inventore consequuntur minus commodi!
					</div>

					<div class="card-body d-sm-flex justify-content-sm-between align-items-sm-center pt-0">
						<ul class="list-inline list-inline-bullet text-muted mb-3 mb-sm-0">
							<li class="list-inline-item">By <a href="#" class="text-body">Admin</a></li>
							<li class="list-inline-item">{{ \Carbon\Carbon::now()->format('d F Y') }}</li>
						</ul>

						<a href="#" class="d-inline-flex align-items-center text-body">
							<i class="ph-heart text-pink me-2"></i>
							2
						</a>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
@endsection