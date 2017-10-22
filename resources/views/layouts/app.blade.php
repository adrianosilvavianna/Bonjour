<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/logo/logo.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('/img/logo/logo.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Bonjou</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bonjour') }}</title>

    @section('css')

    @show

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>


</head>
<body>

<div class="wrapper">

  @auth
      <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Bonjou
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active">
                    <a href="{{ route('home') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                <li>
                    <a href="{{route('user.vehicle.index') }}">
                        <i class="material-icons">directions_car</i>
                        <p>Meus veículos</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.trip.index')}}">
                        <i class="material-icons">near_me</i>
                        <p>Procurar Caronas</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.trip.create') }}">
                        <i class="material-icons">near_me</i>
                        <p>Oferecer Carona</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.trip.index') }}">
                        <i class="material-icons">map</i>
                        <p>Minhas Viagens</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">settings</i>
                        <p>Configurações</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>


    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Material Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
<!--                                <span class="notification">5</span>-->
                                <p class="hidden-lg hidden-md">Notifications</p>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <a class="hidden-lg hidden-md">Perfil</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('user.profile.index') }}">Meu perfil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    @endauth
        <div class="content">

            @if (session('error'))
                <div class="alert alert-danger">
                    <button type="button" aria-hidden="true" class="close">×</button>
                    <span><b> ERRO - </b>{!! session('error') !!}</span>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" aria-hidden="true" class="close">×</button>
                    <span><b> Sucesso - </b>{!! session('success') !!}</span>
                </div>
            @endif
            @if (session('info'))
                <div class="alert alert-info">
                    <button type="button" aria-hidden="true" class="close">×</button>
                    <span><b> Ops - </b>{!! session('info') !!}</span>
                </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning">
                    <button type="button" aria-hidden="true" class="close">×</button>
                    <span><b> Alerta - </b>{!! session('warning') !!}</span>
                </div>
            @endif

            @yield('content')
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery-3.1.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/material.min.js') }}" type="text/javascript"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{ asset('assets/js/material-dashboard.js') }}"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/demo.js') }}"></script>

@section('scripts')

@show

</body>
</html>
