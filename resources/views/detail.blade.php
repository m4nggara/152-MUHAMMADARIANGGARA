@extends('layouts.app')

@section('content')
	<div class="container pt-3">
		<div class="row">
            <h4>
                {{ $item->name }}
                <span class="badge bg-transparant border text-body fs-xs ms-3" style="border-color: #4C9732 !important;">{{ $item->category->name }}</span>
            </h3>
            <ul class="list-inline list-inline-bullet mb-3 mb-lg-2 fs-sm">
                <li class="list-inline-item"><a href="#" class="text-muted">By {{ $item->userBy->name ?? $item->created_by }}</a></li>
                <li class="list-inline-item"><a href="#" class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i:s') }}</a></li>
            </ul>
            <div class="p-4 p-md-5 mb-4" style="background: url('@if(Storage::disk('public')->exists($item->img_path_banner)) {{ Storage::disk('public')->url($item->img_path_banner) }} @else {{ $item->img_path_banner }}  @endif') no-repeat center; background-size: cover; min-height: 300px;"></div>
        </div>
        <div class="row g-3">
            <div class="col-md-8 ps-0">
                <div class="card card-body">
                    {{-- <h6 class="card-title">Deskripsi</h6> --}}
                    {!! $item->desc !!}
                </div>
            </div>
            <div class="col-md-4 pe-0">
                <div class="card card-body">
                    <h6 class="card-title">Kontak dan Lokasi</h6>
                    <ul class="nav flex-column">
						<li class="nav-item">
							<a href="@if(isset($item->phone)) {{ 'tel:' . $item->phone }} @else '#' @endif" class="nav-link">
								<i class="ph-phone me-2"></i>
								{{ $item->phone ?? '-' }}
							</a>
						</li>
						<li class="nav-item">
							<a href="@if(isset($item->email)) {{ 'mailto:' . $item->email }} @else '#' @endif" class="nav-link">
								<i class="ph-envelope me-2"></i>
								{{ $item->email ?? '-' }}
							</a>
						</li>
						<li class="nav-item">
							<a href="@if(isset($item->google_maps)) {{ $item->google_maps }} @else '#' @endif" class="nav-link" target="_blank">
								<i class="ph-house-line me-2"></i>
								{{ $item->address ?? '-' }}
							</a>
						</li>
					</ul>
                </div>
            </div>
        </div>
	</div>
@endsection