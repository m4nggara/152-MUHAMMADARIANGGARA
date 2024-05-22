@extends('admin.app')

@section('title')
    - Master Kategori
@endsection

@section('content-header')
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h6 class="page-title mb-0">
                Ubah Kategori
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

            <form action="{{ route('admin.categories.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Kategori:</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ $item->name }}">
                </div>

                <div class="mb-3 row">
                    <div class="col-md-4">
                        <label class="form-label">Jenis Ikon:</label>
                        <select name="icon_type" class="form-select">
                            <option value="" disabled>--Pilih Jenis--</option>
                            <option value="icon" selected>Font Ikon</option>
                            {{-- <option value="path">Path File Ikon</option> --}}
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Source Ikon:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukan source" name="icon_source" value="{{ $item->icon_source }}">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalIkon"><i class="ph-eye"></i></button>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi: <span class="text-muted">(optional)</span></label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="Masukan deskripsi" name="desc">{{ $item->desc }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="isactive">
                        <option disabled>--Pilih Status--</option>
                        <option value="1" @if(!isset($item->deleted_at) || empty($item->deleted_at)) selected @endif>Aktif</option>
                        <option value="0" @if(isset($item->deleted_at)) selected @endif>Tidak Aktif</option>
                      </select>
                </div>

                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-light" onclick="window.location = '{{ route('admin.categories.index') }}';">Batal</button>
                    <button type="submit" class="btn btn-main ms-3">Simpan</button>
                </div>
            </form>
        </div>
    
    </div>
</div>

{{-- Modal List Ikon --}}
<div id="modalIkon" class="modal modal-lg fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">List Ikon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <x-font-icon/>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link text-muted" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection