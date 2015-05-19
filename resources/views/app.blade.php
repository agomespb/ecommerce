<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM | eAGC</title>

    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ url('adm-favicon.ico') }}">
    <!-- Fonts -->
    {{--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>--}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<header id="header"><!--header-->

    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> (19) 5555-5555</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> atendimento@schoolofnet.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><span><i class="fa fa-adn"></i> ADM-AGCommerce</span></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">

                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="{{ route('categories') }}"><i class="fa fa-folder"></i> Categorias</a></li>
                            <li><a href="{{ route('products') }}"><i class="fa fa-coffee"></i>Produtos</a></li>
                            <li><a href="{{ route('users') }}"><i class="fa fa-users"></i> Usuários</a></li>

                            @if (Auth::guest())
                                <li><a href="{{ url('/auth/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="{{ url('/auth/register') }}"><i class="fa fa-anchor"></i> Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-unlock-alt"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">

                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>

                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Buscar"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->

</header>
<!--/header-->
<section>

    @yield('content')

</section>

<footer id="footer"><!--Footer-->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-Shop Inc. All rights reserved.</p>

                <p class="pull-right">Designed by <span><a target="_blank" href="http://invoinn.com/">InvoInn</a></span>
                </p>
            </div>
        </div>
    </div>

</footer>
<!--/Footer-->
<!-- Scripts -->
<script src="{{ elixir('js/all.js') }}"></script>

@yield('libjs')

</body>
</html>
