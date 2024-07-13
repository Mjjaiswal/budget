<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ url('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/admin/plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/admin/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/admin/dist/css/custom.css') }}">

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')

            <div class="content-wrapper">
                @if (isset($header))
                    {{ $header }}
                @endif
                {{ $slot }}
            </div>
            @include('layouts.footer')
        </div>
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}

        <script src="{{ url('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/admin/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ url('assets/admin/plugins/toastr/toastr.min.js') }}"></script>

        <script>
            @if (session('success'))
                var successMsg = "{{ session('success') }}"; 
                toastr.success(successMsg);
            @endif
            @if (session('error'))
                var errorMsg = "{{ session('error') }}"; 
                toastr.error(errorMsg);
            @endif
        </script>
        @stack('scripts')
    </body>
</html>
