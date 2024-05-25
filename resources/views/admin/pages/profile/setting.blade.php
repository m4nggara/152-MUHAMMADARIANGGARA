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
                    <h5 class="mb-0">Pengaturan</h5>
                </div>

                <div class="card-body">
                   <code>Perubahan password</code>.
                </div>

                <div class="card-body border-top">
                    @if (session('message') != null)    
                    <div class="alert alert-success border-0 alert-dismissible fade show">
                        <span class="fw-semibold">Informasi!</span> {{ session('message') }}. Terimakasih
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
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
                    <form action="{{ route('admin.profile.password.update') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Password Baru <span class="float-lg-end">:</span></label>
                            <div class="col-lg-9 ps-lg-0">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Konfirmasi Password Baru <span class="float-lg-end">:</span></label>
                            <div class="col-lg-9 ps-lg-0">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-main">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection