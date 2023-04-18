<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>NautilusTC | @yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}" />
    @stack('styles')
    <script src="{{ asset('/js/bootstrtap.bundle.min.js') }}"></script>    
    <script src="https://kit.fontawesome.com/d54d78a778.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/navigation.js') }}"></script>
    @stack('scripts')
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Nautilus TC</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">

        </div>
    </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a id="dashboardNav" class="nav-link " aria-current="page" href="{{route('home')}}">
                        <span data-feather="home"><i class="fa-solid fa-chart-pie fa-lg"></i></span>
                        Dashboard
                        </a>
                    </li>
                    <hr>
                    @if (Auth::user()->rol == 'Administrador')       
                        <li class="nav-item">
                            <a  id="usersNav" class="nav-link" href="{{route('users')}}">
                            <span><i class="fa-solid fa-users fa-xl"></i></span>
                            Usuarios
                            </a>
                        </li>
                        <hr>
                    @endif
                    <li class="nav-item">
                        <a id="sessionsNav" class="nav-link" href="{{route('sessions')}}">
                        <span ><i class="fa-solid fa-laptop fa-lg"></i></span>
                        Sesiones
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a id="questionnairesNav" class="nav-link" href="{{route('questionnaires')}}">
                        <span ><i class="fa-solid fa-clipboard-question fa-lg"></i></span>
                        Cuestionarios
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span ><i class="fa-solid fa-user fa-lg"></i></span>
                        Perfil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-danger" type="submit">Cerrar sesión</button>
                                </form>
                            </li>
                          </ul>
                    </li>
                    <hr>
                </ul>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
                @yield('main')
            </main>
        </div>
    </div>
    @yield('javascript')
</body>
</html>