@extends('admin.app')

@section('title')
    - Master Role
@endsection

@section('content-header')
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h6 class="page-title mb-0">
                Buat Data Role
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

            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Role:</label>
                    <input type="text" class="form-control" placeholder="Nama role" name="name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi:</label>
                    <textarea rows="3" cols="3" class="form-control" placeholder="Masukan deskripsi role" name="desc"></textarea>
                </div>

                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-light" onclick="window.location = '{{ route('admin.roles.index') }}';">Batal</button>
                    <button type="submit" class="btn btn-main ms-3">Simpan</button>
                </div>
            </form>
        </div>
    
    </div>
</div>
@endsection