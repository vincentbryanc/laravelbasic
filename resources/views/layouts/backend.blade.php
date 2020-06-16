<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('assets/images/logos/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ URL::asset('assets/images/logos/logo.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <!-- Datatable CSS -->
    <link href="{{ URL::asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!-- Dropzone CSS -->
    <link href="{{ URL::asset('assets/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="{{ URL::asset('assets/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- Needed css -->
    <link href="{{ URL::asset('dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('layouts.backend-header')
        @include('layouts.backend-sidebar')
        <div class="page-wrapper">
            @yield('content')
        </div>
        <footer class="footer text-center">
            {{ config('app.name') }} | Copyright &copy; {{ date('Y') }}
        </footer>
    </div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ URL::asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ URL::asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ URL::asset('dist/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/app.init.js') }}"></script>
    <script src="{{ URL::asset('dist/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ URL::asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ URL::asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ URL::asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ URL::asset('dist/js/custom.min.js') }}"></script>
    <!-- Sweetalert Javascript -->
    <script src="{{ URL::asset('assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <!-- Datatable Javascript -->
    <script src="{{ URL::asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <!-- Dropzone Javascript -->
    <script src="{{ URL::asset('assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <!-- Select2 Javascript -->
    <script src="{{ URL::asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <!-- Additional Script -->
    @yield('script')
</html>