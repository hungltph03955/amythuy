<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('public/bower_components/bootstrap-datepicker/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{asset('public/style.css')}}">
    @stack('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper templates-login">
        <section class="content">
            @yield('content')
        </section>
    </div>
</div>

<script src="{{asset('public/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('public/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/dist/js/demo.js')}}"></script>
<script src="{{asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/tinymce/js/tinymce/tinymce.min.js')}}"></script>
@stack('scripts')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
