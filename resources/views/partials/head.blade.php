    
    <title>@yield('title','SIPCOM | SIAC')</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{{ URL::asset('img/logo_plane_color.png') }}}">
    <link rel="icon" href="{{{ URL::asset('img/logo_plane_color.png') }}}">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="{{{ URL::asset('css/font-awesome.min.css') }}}" />

    {{--  <link rel="stylesheet" href="../assets/css/material-dashboard.css?v=2.0.0">  --}}

    <link rel="stylesheet" href="{{{ URL::asset('css/material-dashboard.css') }}}">


    <!--     DataTables     -->
    <!-- Latest compiled and minified CSS -->
    <link href="{{{ URL::asset('css/datatables.bootstrap.css') }}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{{ URL::asset('css/buttons.dataTables.min.css') }}}">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, dont include it in your project -->
    {{--  <link href="{{{ URL::asset('assets-for-demo/demo.css')}}}" rel="stylesheet" />   --}}
    <!-- iframe removal -->