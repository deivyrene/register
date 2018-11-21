<div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag  
    -->
    
    <div class="logo">
        <a href="/siac/home" target="_blank" class="simple-text logo-normal">
            <img width="200" src="{{{ URL::asset('img/sipcom.png') }}}">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active ">
                <a class="nav-link" href="/home">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <div  class="dropdown-menu dropdown-menu-right">
                <a class="nav-link" href="#">
                    <i class="material-icons">content_paste</i>
                    <p>Tablas Principales</p>
                </a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">content_paste</i>
                        <p>Tablas Principales</p>
                    </a>
                    @if(Auth::user()->hasRole('admin'))
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('edifices.index') }}">Edificio</a>
                            <a class="dropdown-item" href="{{ route('places.index') }}">Oficinas</a>
                            <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                            <a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a>
                        </div>
                    @elseif(Auth::user()->hasRole('adminEdifice'))
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('places.index') }}">Oficinas</a>
                            <a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a>
                        </div>
                    @endif
                    
                </li>
            @if(Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url('visitorsList') }}">
                    <i class="material-icons">person_add</i>
                    <p>Visitantes</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('visitors.index') }}">
                    <i class="material-icons">location_city</i>
                    <p>Visitas</p>
                </a>
            </li>
        </ul>
    </div>
</div>