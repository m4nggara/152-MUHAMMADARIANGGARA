@extends('admin.app')

@section('title')
    - Master Pengguna
@endsection

@section('content-header')
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h6 class="page-title mb-0">
                Master Data Pengguna
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
                <span class="fw-semibold">Informasi!</span> Sukses {{ session('message') }} data pengguna <a href="#" class="alert-link">{{ session('user')->name }}</a>. Terimakasih
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
                    <a href="{{ route('admin.users.create') }}" class="dropdown-item">Tambah Pengguna</a>
                    <a href="#" class="dropdown-item">Export Data Pengguna</a>
                </div>
            </div>
        </div>
    
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Ubah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{!! isset($item->deleted_at) ? '<span class="badge bg-danger">Tidak Aktif</span>' : '<span class="badge bg-success">Aktif</span>' !!}</td>
                        <td>
                            <a class="p-1" href="{{ route('admin.users.edit', $item->id) }}">
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