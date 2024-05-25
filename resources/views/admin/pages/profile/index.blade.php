@extends('admin.appsecondary')

@section('title')
    - Profile
@endsection

@section('content')
<div class="content container pb-0">
    <div class="row">
        <div class="col-lg-4">
            @include('admin.pages.profile.left')
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-sm-flex">
                    <h5 class="mb-0">Profil</h5>
                    @if (!$edit)    
                    <div class="mt-2 mt-sm-0 ms-auto">
                        <a href="{{ route('admin.profile.index', ['edit' => true]) }}" class="text-main">
                            <i class="ph-pencil me-1"></i>
                            Edit
                        </a>
                    </div>
                    @endif
                </div>

                <div class="card-body border-top">
                    @if (session('message') != null)    
                    <div class="alert alert-success border-0 alert-dismissible fade show">
                        <span class="fw-semibold">Informasi!</span> {{ session('message') }}. Terimakasih
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    <form action="{{ route('admin.profile.edit') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Nama <span class="float-lg-end">:</span></label>
                            <div class="col-lg-9 ps-lg-0">
                                <input type="text" class="form-control" name="name" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" @if (!$edit) readonly @endif>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Email <span class="float-lg-end">:</span></label>
                            <div class="col-lg-9 ps-lg-0">
                                <input type="text" class="form-control" name="email" placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}" @if (!$edit) readonly @else readonly disabled @endif>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Kontak <span class="float-lg-end">:</span></label>
                            <div class="col-lg-9 ps-lg-0">
                                <input type="text" class="form-control" name="contact" placeholder="" value="-" @if (!$edit) readonly @endif>
                            </div>
                        </div>

                        @if ($edit) 
                        <div class="text-end">
                            <a class="btn btn-light" href="{{ route('admin.profile.index') }}">Batal</a>
                            <button type="submit" class="btn btn-main">Simpan</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection