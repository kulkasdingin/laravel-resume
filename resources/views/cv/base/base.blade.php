<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View CV</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Infile style -->
    @yield('style')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte/dist/css/adminlte.min.css') }}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('/assets/custom/css/custom.css') }}">
</head>

    <body class="hold-transition sidebar-mini">
        <div class="content" id="app">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('/assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Infile Script-->
    @yield('script')
    <!-- AdminLTE App -->
    <script src="{{ asset('/assets/adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- Vue -->
    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>
