<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="apple-touch-icon" href="{{{ URL::asset('img/logo_plane_color.png') }}}">
    <link rel="icon" href="{{{ URL::asset('img/logo_plane_color.png') }}}">
    <title>SIAC</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{{ URL::asset('landing/css/bootstrap.min.css') }}}">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="{{{ URL::asset('landing/css/all.min.css') }}}">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,500i,700,700i' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,500i,700,700i' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{{ URL::asset('landing/css/magnific-popup.css') }}}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{{ URL::asset('landing/css/creative.min.css') }}}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{{ URL::asset('css/animate.css') }}}">

    <link rel="stylesheet" href="{{{ URL::asset('landing/css/init.css') }}}">

    <link rel="stylesheet" href="{{{ URL::asset('css/font-awesome.min.css') }}}" />

    <!--     DataTables     -->
    <!-- Latest compiled and minified CSS -->
    <link href="{{{ URL::asset('css/datatables.bootstrap.css') }}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{{ URL::asset('css/buttons.dataTables.min.css') }}}">

    
</head>
<body>
    <div id="page-top">

        <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
                    <div class="container">
                    <a class="navbar-brand js-scroll-trigger" href="#page-top">Visitame</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            @if(Auth::guest())
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#about">Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#portfolio">Clientes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#contact">Contáctanos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#exampleModal">Ingresar</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#buscarRun">Ingresar Visita</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#buscarFecha">Rango de Fecha</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#" id="listPlace" >Oficinas</a>
                                </li>
                                <li class="nav-item dropdown">
                                        <a class="nav-link" href="#pablo" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="far fa-user"></i>
                                            <p>
                                                <span class="d-lg-none d-md-block">Account</span>
                                            </p>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                                <li class="nav-item">
                                                        <a class="nav-link js-scroll-trigger" href="#" id="listPlace" >{{ Auth::user()->name }} </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                        Salir
                                                    </a>
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                        </ul>
                                    </li>
                            @endif
                        </ul>
                    </div>
                    </div>
            </nav>

            <div class="wrapper wrapper-full-page">
                <div class="page-header register-page header-filter" filter-color="black" style=" background-size: cover; background-position: top center;">
                    @yield('content')
                </div>
            </div>

            
    </div>


    <!-- Scripts -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpkE904WC3FuB1YBpisL9V2mJteUNGCqs"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{{ URL::asset('js/core/jquery.min.js') }}}"></script>
    <script src="{{{ URL::asset('landing/js/bootstrap.bundle.min.js') }}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{{ URL::asset('landing/js/jquery.easing.min.js') }}}"></script>
    <script src="{{{ URL::asset('landing/js/scrollreveal.min.js') }}}"></script>
    <script src="{{{ URL::asset('landing/js/jquery.magnific-popup.min.js') }}}"></script>

     <!-- Custom scripts for this template -->
    <script src="{{{ URL::asset('landing/js/creative.min.js') }}}" type="text/javascript"></script>

    <script src="{{{ URL::asset('landing/js/wow.js') }}}"></script>

    <script src="{{{ URL::asset('landing/js/jquery.flip.min.js') }}}"></script>
    <script>
        new WOW().init();
    </script>

    <!-- Datatables -->
    <script src="{{{ URL::asset('js/jquery.dataTables.min.js') }}}"></script>

    <script src="{{{ URL::asset('js/plugins/dataTables/dataTables.buttons.min.js') }}}"></script>
    <script src="{{{ URL::asset('js/plugins/dataTables/buttons.flash.min.js') }}}"></script>
    <script src="{{{ URL::asset('js/plugins/dataTables/jszip.min.js') }}}"></script>
    <script src="{{{ URL::asset('js/plugins/dataTables/pdfmake.min.js') }}}"></script>
    <script src="{{{ URL::asset('js/plugins/dataTables/vfs_fonts.js') }}}"></script>
    <script src="{{{ URL::asset('js/plugins/dataTables/buttons.html5.min.js') }}}"></script>
    <script src="{{{ URL::asset('js/plugins/dataTables/buttons.print.min.js') }}}"></script>

    <script src="{{{ URL::asset('landing/js/init.js') }}}"></script>

    <script src="{{{ URL::asset('js/app/visitor.js') }}}"></script>
    <script src="{{{ URL::asset('js/app/place.js') }}}"></script>
</body>
</html>
