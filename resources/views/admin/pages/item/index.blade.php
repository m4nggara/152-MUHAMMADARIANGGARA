@extends('admin.app')

@section('title')
    - Master Item
@endsection

@section('sidebar-collapse')
    sidebar-main-resized
@endsection

@section('content-header')
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h6 class="page-title mb-0">
                Master Data Item
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
                <span class="fw-semibold">Informasi!</span> Sukses {{ session('message') }} data item <a href="#" class="alert-link">{{ session('item')->name }}</a>. Terimakasih
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
                    <a href="{{ route('admin.items.create') }}" class="dropdown-item">Tambah Item</a>
                    <a href="#" class="dropdown-item">Export Data Item</a>
                </div>
            </div>
        </div>
    
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Kategori</th>
                        {{-- <th>No.</th> --}}
                        <th>Item</th>
                        {{-- <th>Deskripsi</th> --}}
                        <th>Owner</th>
                        <th>Kontak</th>
                        <th>IMG Banner</th>
                        <th>Status</th>
                        <th>Ubah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $key => $item)
                    <tr>
                        <td>{!! '<span class="badge '.($item->category->name == "Produk" ? "bg-yellow" : "bg-primary").'">'. $item->category->name.'</span>' !!}</td>
                        {{-- <td>{{ $key + 1 }}.</td> --}}
                        <td>{{ $item->name }}</td>
                        {{-- <td>{{ $item->desc }}</td> --}}
                        <td>{{ $item->owner }}</td>
                        <td>{{ $item->address }} <br><br> <span class="text-muted">Phone:</span> {{ $item->phone ?? '-' }} <br> <span class="text-muted">Email:</span> {{ $item->email ?? '-' }}</td>
                        <td><img src="{{ $item->img_path_banner }}" alt="{{ $item->name }}" width="60" height="60"></td>
                        <td>{!! isset($item->deleted_at) ? '<span class="badge bg-danger">Tidak Aktif</span>' : '<span class="badge bg-success">Aktif</span>' !!}</td>
                        <td>
                            <a class="p-1" href="{{ route('admin.items.edit', $item->id) }}">
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