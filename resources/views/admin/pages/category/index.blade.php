@extends('admin.app')

@section('title')
    - Master Kategori
@endsection

@section('content-header')
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h6 class="page-title mb-0">
                Master Data Kategori
            </h6>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content pt-0">
    <div class="card">

        <div class="card-body">
            @if (session('message') != null)    
            <div class="alert alert-success border-0 alert-dismissible fade show">
                <span class="fw-semibold">Informasi!</span> Sukses {{ session('message') }} data kategori <a href="#" class="alert-link">{{ session('category')->name }}</a>. Terimakasih
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            <div class="btn-group float-end">
                <button type="button" class="btn btn-main btn-opacity-3">
                    <i class="ph-gear me-2"></i>
                    Aksi
                </button>
                <button type="button" class="btn btn-main dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <a href="{{ route('admin.categories.create') }}" class="dropdown-item">Tambah Kategori</a>
                    <a href="#" class="dropdown-item">Export Data Kategori</a>
                </div>
            </div>
        </div>
    
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>Kategori Item</th>
                        <th class="text-center">Ikon</th>
                        <th>Status</th>
                        <th>Ubah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">@if($item->icon_type == 'icon') <i class="{{ $item->icon_source }}"></i> @else <img src="{{ Storage::path($item->icon_source) }}" alt="ikon kategori" width="40" height="40"> @endif</td>
                        <td>{!! isset($item->deleted_at) ? '<span class="badge bg-danger">Tidak Aktif</span>' : '<span class="badge bg-success">Aktif</span>' !!}</td>
                        <td>
                            <a class="p-1" href="{{ route('admin.categories.edit', $item->id) }}">
                                <i class="ph-pencil-simple text-main m-1"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection