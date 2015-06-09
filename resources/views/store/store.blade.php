<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | eAGC</title>

    <link rel="shortcut icon" href="{{ url('loja_favicon.jpg') }}">

    {{--@yield('css_customizado')--}}

    @section('styles')
        <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    @show

</head>
<!--/head-->

<body>
<header id="header"><!--header-->

    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> (84) 5555-5555</a></li>
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
                        <a href="/"><span>AGCommerce</span></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">


                            <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>

                            @if (Auth::guest())
                                <li><a href="{{ url('/auth/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="{{ url('/auth/register') }}"><i class="fa fa-anchor"></i> Register</a></li>
                            @else
                                <li><a href="{{ route('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">{{ substr(Auth::user()->name, 0, strpos(Auth::user()->name, " ")) }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-unlock-alt"></i> Logout</a></li>
                                        <li class=""></li>
                                        <li><a href="{{ route('user_index') }}"><i class="fa fa-user"></i> Minha conta</a></li>
                                    </ul>
                                </li>

                            @endif

                            @if (Auth::guest())
                                <li><a href="{{ route('categories') }}"><i class="fa fa-code"></i> Área Restrito</a></li>
                            @else
                                @if(Auth::user()->is_admin)
                                    <li><a href="{{ route('categories') }}"><i class="fa fa-code"></i> Área Restrito</a></li>
                                @endif
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

                                    {{--<li><a href="">Products</a></li>--}}
                                    {{--<li><a href="">Product Details</a></li>--}}

                                    <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>

                                @if (Auth::guest())
                                        <li><a href="{{ url('/auth/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                        <li><a href="{{ url('/auth/register') }}"><i class="fa fa-anchor"></i> Register</a></li>
                                    @else
                                        <li><a href="{{ route('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-unlock-alt"></i> Logout</a></li>
                                    @endif

                                </ul>
                            </li>

                            <li><a href="{{ route('contact') }}">Contato</a></li>
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

    <div class="container">
        <div class="row">

            @yield('cart_content')

            <div class="col-sm-3">
                @yield('sidebar_left')
            </div>

            <div class="col-sm-9 padding-right">
                @yield('content')
            </div>

        </div>
    </div>

    {{--<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">--}}
        {{--<div class="modal-content">--}}
            {{--<ul class="list-inline item-details">--}}
                {{--<li><a href="http://themifycloud.com">ThemifyCloud</a></li>--}}
                {{--<li><a href="http://themescloud.org">ThemesCloud</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}

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


@section('scripts')
    <script src="{{ elixir('js/all.js') }}"></script>
@show


</body>
</html>