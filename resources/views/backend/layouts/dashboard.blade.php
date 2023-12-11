<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
    <link href="{{ asset('backend/dashboard.css') }}" rel="stylesheet" />
	{{-- Sweet Alert --}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<title>Sell Property</title>
	@stack('styles')
</head>
<body>


	<!-- SIDEBAR -->
    @include('backend.layouts.includes.sidebar')
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
        @include('backend.layouts.includes.navbar')
		<!-- NAVBAR -->
        <!-- MAIN -->
		@yield('content')
        <!-- MAIN -->

	</section>
	<!-- CONTENT -->
	

	<script src="{{ asset('backend/dashboard.js') }}"></script>
	{{-- sweet alert toast javascript --}}
	<script>
		var toastMixin = Swal.mixin({
			toast: true,
			icon: 'success',
			title: 'General Title',
			animation: false,
			position: 'top-right',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		});

		@if(session('success'))
			toastMixin.fire({
				animation: true,
				title: @json(session('success'))
			});
		@endif

		@if(session('error'))
			toastMixin.fire({
				title: @json(session('error')),
				icon: 'error'
			});
		@endif
	</script>
 {{-- sweet alert toast javascript --}}
	@stack('scripts')
</body>
</html>