<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin @yield('title')</title>

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

        {{-- sidebar --}}
		@include('admin.sidebar')

		<div class="content-wrapper">

			{{-- navbar --}}
            @include('admin.navbar')


			<div class="content-inner">

                {{-- content header --}}
                @yield('content-header')

                {{-- content --}}
                @yield('content')

                {{-- footer --}}
				@include('admin.footer')

			</div>

		</div>

	</div>

    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/admin.js') }}"></script>
</body>
</html>