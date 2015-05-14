
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shop</title>


    <link href="loja/css/bootstrap.min.css" rel="stylesheet">
    <link href="loja/css/font-awesome.min.css" rel="stylesheet">
    <link href="loja/css/prettyPhoto.css" rel="stylesheet">
    <link href="loja/css/animate.css" rel="stylesheet">
    <link href="loja/css/main.css" rel="stylesheet">
    <link href="loja/css/responsive.css" rel="stylesheet">


</head><!--/head-->

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
    </div><!--/header_top-->

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
                            <li><a href="#"><i class="fa fa-user"></i> Minha conta</a></li>
                            <li><a href="http://commerce.dev:10088/checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="http://commerce.dev:10088/cart"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
                            <li><a href="http://commerce.dev:10088/auth/login"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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
    </div><!--/header-bottom-->
</header><!--/header-->



<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Categorias</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->



                        @foreach($categorias as $categoria)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">{{ $categoria }}</a></h4>
                            </div>
                        </div>
                        @endforeach


                    </div><!--/category-products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->

                    <h2 class="title text-center">Em destaque</h2>

                    @foreach($produtos as $produto)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">

                                    <img src="uploads/4.jpg" alt="" />

                                    <h2>R$ {{ number_format($produto->price, 2, ',', '.') }}</h2>
                                    <p>{{ $produto->name }}</p>
                                    <a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>R$ {{ number_format($produto->price, 2, ',', '.') }}</h2>
                                        <p>{{ $produto->name }}</p>
                                        <a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                        <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div><!--features_items-->



                <div class="features_items"><!--recommended-->
                    <h2 class="title text-center">Recomendados</h2>

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">


                                    <img src="http://commerce.dev:10088/images/no-img.jpg" alt="" width="200"/>

                                    <h2>R$ 14,00</h2>
                                    <p>quasi</p>
                                    <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>R$ 14</h2>
                                        <p>quasi</p>
                                        <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                        <a href="http://commerce.dev:10088/cart/4/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">


                                    <img src="http://commerce.dev:10088/images/no-img.jpg" alt="" width="200"/>

                                    <h2>R$ 96,00</h2>
                                    <p>officia</p>
                                    <a href="http://commerce.dev:10088/product/5" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>R$ 96</h2>
                                        <p>officia</p>
                                        <a href="http://commerce.dev:10088/product/5" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                        <a href="http://commerce.dev:10088/cart/5/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">



                                    <img src="http://commerce.dev:10088/uploads/14.jpg" alt="" />


                                    <h2>R$ 34.343,00</h2>
                                    <p>fdsfsfdsfs</p>
                                    <a href="http://commerce.dev:10088/product/42" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>R$ 34343</h2>
                                        <p>fdsfsfdsfs</p>
                                        <a href="http://commerce.dev:10088/product/42" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                        <a href="http://commerce.dev:10088/cart/42/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!--recommended-->

            </div>

        </div>
    </div>
    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <ul class="list-inline item-details">
                <li><a href="http://themifycloud.com">ThemifyCloud</a></li>
                <li><a href="http://themescloud.org">ThemesCloud</a></li>
            </ul>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->




    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-Shop Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://invoinn.com/">InvoInn</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="loja/js/jquery.js"></script>
<script src="loja/js/bootstrap.min.js"></script>
<script src="loja/js/jquery.scrollUp.min.js"></script>
<script src="loja/js/jquery.prettyPhoto.js"></script>
<script src="loja/js/main.js"></script>

</body>
</html>