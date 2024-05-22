@extends('admin.app')

@section('title')
    - Master Pengguna
@endsection

@section('content-header')
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h6 class="page-title mb-0">
                Edit Data Pengguna
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

            <form action="{{ route('admin.users.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Pengguna:</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ $item->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $item->email }}">
                </div>

                {{-- <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" value={{ old('password') }}>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password:</label>
                    <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation">
                </div> --}}

                {{-- <div class="mb-3 d-none">
                    <label class="form-label">Role:</label>
                    <div class="border p-3 rounded">
                        @forelse ($roles ?? [] as $role)    
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="id_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" @if(isset($role->deleted_at)) disabled @endif @if(in_array($role->id, $uroles)) checked @endif>
                            <label class="form-check-label" for="id_{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                        @empty
                            
                        @endforelse
                    </div>
                </div> --}}

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="isactive">
                        <option disabled>--Pilih Status--</option>
                        <option value="1" @if(!isset($item->deleted_at) || empty($item->deleted_at)) selected @endif>Aktif</option>
                        <option value="0" @if(isset($item->deleted_at)) selected @endif>Tidak Aktif</option>
                      </select>
                </div>

                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-light" onclick="window.location = '{{ route('admin.users.index') }}';">Batal</button>
                    <button type="submit" class="btn btn-main ms-3">Simpan</button>
                </div>
            </form>
        </div>
    
    </div>
</div>
@endsection