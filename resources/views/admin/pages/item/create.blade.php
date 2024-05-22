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
                Tambah Item
            </h6>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content pt-0">
    <div class="card">

        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-warning border-0 alert-dismissible fade show">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <form action="{{ route('admin.items.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kategori:</label>
                    <select name="category" class="form-select">
                        <option value="" disabled selected>--Pilih Kategori--</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Judul Item:</label>
                    <input type="text" class="form-control" placeholder="Nama Item" name="name" value={{ old('name') }}>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi: </label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="Masukan deskripsi" name="desc">{{ old('desc') }}</textarea>
                </div>

                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-light" onclick="window.location = '{{ route('admin.items.index') }}';">Batal</button>
                    <button type="submit" class="btn btn-main ms-3">Simpan</button>
                </div>
            </form>
        </div>
    
    </div>
</div>
@endsection