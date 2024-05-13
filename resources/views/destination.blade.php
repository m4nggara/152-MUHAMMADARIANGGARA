@extends('layouts.app', ['pageTitle' => 'Destinasi'])

@section('content')
	<div class="container pt-3">
		<div class="row align-items-md-stretch">
			@php
				// Helper for style card
				function isPrima($number) : bool
				{
					if ($number == 1) return false;
					for ($i = 2; $i <= $number/2; $i++){
						if ($number % $i == 0)
							return false;
					}
					return true;
				}
			@endphp
			@for ($i = 1; $i <= 50; $i++)	
				<div class="col-md-6 mb-2">
					<div class="h-100 p-5 text-white @if(isPrima($i)) bg-dark @endif rounded-3" style="@if(!isPrima($i)) background-image:url(https://source.unsplash.com/random/?destination&sig={{ $i }}) @endif">
					<h2 class="@if(isPrima($i)) text-white @else text-black @endif">Destinasi {{ $i }}</h2>
					<p class="@if(isPrima($i)) text-white @else text-black @endif">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab odit reprehenderit earum libero ex maiores voluptates facilis dignissimos tempore, pariatur impedit possimus explicabo quibusdam deserunt tenetur enim exercitationem saepe nihil.</p>
					<form action="{{ route('detail', ['slug' => 'Destinasi ' . $i]) }}" method="post">
						@csrf
						<button class="btn btn-outline-light text-white" type="submit" style="background-color: #E9BE26 !important; border-color: #E9BE26 !important;">Lihat Detail</button>
					</form>
					</div>
				</div>
			@endfor
			
		</div>

		{{-- Pagination --}}
		<div class="d-flex justify-content-center pt-1 mb-1 mt-3">
			<ul class="pagination pagination-flat">
				<li class="page-item"><a href="#" class="page-link rounded-pill"><i class="ph-arrow-left"></i></a></li>
				<li class="page-item active"><a href="#" class="page-link rounded-pill text-black" style="background-color: #E9BE26 !important; border-color: #E9BE26 !important;">1</a></li>
				<li class="page-item"><a href="#" class="page-link rounded-pill">2</a></li>
				<li class="page-item align-self-center"><span class="mx-2">...</span></li>
				<li class="page-item"><a href="#" class="page-link rounded-pill">49</a></li>
				<li class="page-item"><a href="#" class="page-link rounded-pill">50</a></li>
				<li class="page-item"><a href="#" class="page-link rounded-pill"><i class="ph-arrow-right"></i></a></li>
			</ul>
		</div>

	</div>
@endsection