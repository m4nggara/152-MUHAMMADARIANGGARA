<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="icon" type="image/x-icon" href="assets/images/fav.ico">

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- icon --}}
	<link href="{{ url('vendor/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('vendor/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">

    {{-- styles --}}
    <link href="{{ url('assets/css/admin.css') }}" rel="stylesheet" type="text/css">
    <style>
        * {
            font-family: 'Poppins', "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"
        }
    </style>

</head>
<body>

	<div class="page-content">

		<div class="content-wrapper">

			<div class="content-inner">

				<div class="content d-flex justify-content-center align-items-center">

					<form class="login-form" action="{{ route('login.auth') }}" method="POST">
						@csrf
						<div class="card mb-0">
							<div class="card-body">
								<div class="text-center mb-3">
									<div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
										<a href="{{ route('home') }}"><img src="{{ url('assets/images/logo_icon.svg') }}" class="h-48px" alt=""></a>
									</div>
									<h5 class="mb-0">Tenjo<span class="fw-bold">Kampung</span></h5>
									<span class="d-block text-muted">Login</span>
								</div>

								@if ($errors->any())
								<div class="alert alert-danger border-0 alert-dismissible fade show">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
									<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								</div>
								@endif

								<div class="mb-3">
									<label class="form-label">Username</label>
									<div class="form-control-feedback form-control-feedback-start">
										<input type="text" class="form-control" placeholder="tenjo@kampung.com" name="email">
										<div class="form-control-feedback-icon">
											<i class="ph-user-circle text-muted"></i>
										</div>
									</div>
								</div>

								<div class="mb-3">
									<label class="form-label">Password</label>
									<div class="form-control-feedback form-control-feedback-start">
										<input type="password" class="form-control" placeholder="•••••••••••" name="password">
										<div class="form-control-feedback-icon">
											<i class="ph-lock text-muted"></i>
										</div>
									</div>
								</div>

								<div class="mb-3">
									<button type="submit" class="btn btn-main w-100">Sign in</button>
								</div>
							</div>
						</div>
					</form>

				</div>

			</div>

		</div>

	</div>

    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>