@extends('admin.app')

@section('title')
    - Master Role
@endsection

@section('content-header')
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h6 class="page-title mb-0">
                Edit Data Role
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

            <form action="{{ route('admin.roles.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Role:</label>
                    <input type="text" class="form-control" placeholder="Nama role" name="name" value="{{ $item->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi:</label>
                    <textarea rows="3" cols="3" class="form-control" placeholder="Masukan deskripsi role" name="desc">{{ $item->desc }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="isactive">
                        <option disabled>--Pilih Status--</option>
                        <option value="1" @if(!isset($item->deleted_at)) selected @endif>Aktif</option>
                        <option value="0" @if(isset($item->deleted_at)) selected @endif>Tidak Aktif</option>
                      </select>
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