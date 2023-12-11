<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <!-- Add this to the head of your HTML document -->
    <!-- Add this to the head of your HTML document -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @yield('styles')
    @stack('styles')
</head>

<body>
    @include('frontend.layouts.includes.navbar')
    @include('frontend.layouts.includes.header')

    <!-- Main Content -->
    <main>
        @yield('content')
        @include('frontend.layouts.includes.modal.sell-property-modal')
        @include('frontend.layouts.includes.modal.redirect-login-signup-modal')
    </main>


    <!-- Common Footer -->
    @include('frontend.layouts.includes.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include additional JS files -->
    @yield('scripts')
    @stack('scripts')

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
</body>

</html>
