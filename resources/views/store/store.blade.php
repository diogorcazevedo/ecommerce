<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Carla Buaiz Joias</title>


    <link href="{{ url(elixir('css/all.css')) }}" rel="stylesheet">


</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <img class="img-responsive" src="{{url('img/logo.png')}}" alt="" width="100" />
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
                <div class="col-sm-2">
                    <div class="logo pull-left">
                        <a href="{{route('home')}}"><span>Carla Buaiz</span></a>
                    </div>

                </div>
                <div class="col-sm-10">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
                            <li><a href="{{route('account.orders')}}"><i class="fa fa-check-circle"></i> Minha conta</a></li>
                            <ul class="nav navbar-nav navbar-right">
                                @if(auth()->guest())
                                    @if(!Request::is('auth/login'))
                                        <li><a href="{{ url('/auth/login') }}"><i class="fa fa-user"></i> Login</a></li>
                                    @endif
                                    @if(!Request::is('auth/register'))
                                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                                    @endif
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    @yield('head')

</header><!--/header-->



<section>
    <div class="container">
        <div class="row">

@yield('categories')
@yield('content')



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



<script src="{{ url(elixir('js/all.js')) }}"></script>

</body>
</html>