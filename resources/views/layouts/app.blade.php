<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tasks') }}</title>
    
    <link rel="stylesheet" type="text/css" href="{!! asset('adminlte/css/admin.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('bootstrap/css/bootstrap.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('bootstrap/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('bootstrap/css/bootstrap-datetimepicker.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('adminlte/css/AdminLTE.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('adminlte/css/skins/_all-skins.min.css') !!}"> 
    <!-- Scripts -->     
    <script src="{!! asset('adminlte/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{!! asset('bootstrap/js/bootstrap-datetimepicker.js') !!}"></script>

</head>
<body class="skin-blue sidebar-mini">
    @if (!Auth::guest())
        @include('admin.layouts')
    @else
        @include('auth.layouts')
    @endif

    <script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('adminlte/js/app.js') !!}"></script>

    <script type="text/javascript">
        setTimeout(function(){
          $('body .notification-panel .alert').fadeOut(function(){
                $(this).remove();
              });    
            },5000);
    </script>
</body>
</html>
