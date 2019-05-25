<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{ asset('components/slick/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('components/slick/slick-theme.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/index.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

    <style>
        .right {
            float: right !important;
        }

        .container-menu {
            background-image: inherit !important;
            background-color: transparent !important;
        }

        .dropdown-menu {
            padding: 0 !important;
            margin: 0 !important;
            min-height: 40px !important;
        }

        .dropdown-menu li {
            width: 100%;
            padding: 0px !important;
            margin: 0 !important;
        }

        .dropdown-menu li a {
            padding: 8px 14px !important;
            color: #0c1a38 !important;
            background-color: rgba(255, 255, 255, 0.5);
            border-bottom: solid 1px rgba(238, 238, 238, 1.00);
        }

        .dropdown-menu li a:hover {
            background-color: rgba(46, 123, 205, 0.1);
            border-bottom: solid 1px rgba(46, 123, 205, 0.2);

        }
    </style>

    @yield('extra-css')
    <title>@yield('title', 'Furniture')</title>
</head>
<body>
<header id="header-menu">
    <nav>
        <div id="menu-container">
            <ul>
                <li><a href="{{ url('/') }}" class="menu-selected">Inicio</a></li>
                <li><a href="http://www.codizer.com/#contactanos">Contacto</a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                    <li><a href="{{ url('/register') }}">Resgistrarse</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Bienvenido {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('client.show') }}">Mi cuenta</a></li>
                            @if(Auth::user()->type == 'admin')
                                <li><a href="{{ url('/home') }}">Administración</a></li>
                            @endif
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesión</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <div id="menu-secundario">
                <h2>Secciones</h2>
                @include('partials.menu-store')
            </div>
        </div>

        <div id="lang-container">
            <ul>
                <li><a href="#"><img src="{{ asset('media/icon/a.png') }}" alt="a"></a></li>
                <li><a href="#"><img src="{{ asset('media/icon/b.png') }}" alt="a"></a></li>
                <li><a href="#"><img src="{{ asset('media/icon/c.png') }}" alt="a"></a></li>
                <li><a href="#"><img src="{{ asset('media/icon/d.png') }}" alt="a"></a></li>
            </ul>
        </div>
    </nav>
</header>

<div id="title-container">
    <div>
        <button id="menu-a">---</button>
        <a href="{{ url('/') }}">
            <img src="{{ asset('media/logo.png') }}" id="logo" width="239" height="65">
        </a>
        <ul id="cart-container-global">
            <li>
                <a href="{{route('cliente.carrito.index')}}">
                    <img src="{{ asset('media/icon/cart-icon.png') }}" width="30" height="25"/>
                    <span id="cart-info">Carrito:</span>
                    <span id="cart-desc">Carrito de compras</span>
                    <span id="cart-count">Productos</span>
                </a>
            </li>
            <li>
                <span>Moneda: </span>
                <select name="moneda-general" id="moneda-general">
                    <option value="1">Us Dollar</option>
                    <option value="2">Mx Pesos</option>
                </select>
            </li>
        </ul>
        <div id="global-search">
            {!! Form::open(['route' => 'buscar.index', 'method' => 'GET', 'id' => 'form-buscar']) !!}
            {!! Form::text('buscar', null, ['id' => 'txtBuscar', 'placeholder' => 'Buscar en la tienda']) !!}
            <style>
                .result-items-z {
                    display: none;
                    position: fixed;
                    z-index: 100;
                    margin-top: 60px;
                    border: 1px solid;
                    width: 300px;
                    background: white;
                    height: 300px !important;
                    overflow: auto;
                }
            </style>
            <div class="result-items-z">
                <button id="btn-hide-item-search-z">x</button>
                <ul id="list-items-search">

                </ul>
            </div>
            <input type="submit" value="Ir">
            {!! Form::close() !!}
        </div>
    </div>
</div>


<div class="container-general">
    <div class="container-menu">
        @include('partials.menu-store')
    </div>


    @yield('content')


</div>
<footer>
    <div class="footer-top">
        <div>
            <ul>
                <li><h3>Home</h3></li>
                <li><a href="#">Featured</a></li>
                <li><a href="#">What's New?</a></li>
                <li><a href="#">Specials</a></li>
                <li><a href="#">Reviews</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Create an Account</a></li>
                <li><a href="#">Shipping & Return</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><h3>Contacts:</h3></li>
                <li><p>06060 Hidalgo, Ciudad de México, México</p></li>
                <li><span>Tel: (55) 567-8901</span></li>
                <li><span>Tel: (55) 567-8902</span></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">RSS</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <ul>
            <li><a href="#">Codizer © 2019</a></li>
            <li><a href="#">Confidencialidad</a></li>
            <li><a href="#">Condiciones de uso</a></li>
        </ul>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('components/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/index-store.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/panel-buscador.js') }}"></script>
@yield('extra-scripts')
</body>
</html>