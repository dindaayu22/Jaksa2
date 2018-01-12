<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="_token" content="{{ csrf_token() }}" />
        <link rel="icon" type="image/png') }}" href="{{ URL::to('/assets/img/logo-mini.png') }}">
        <title>Perpustakaan Kejaksaan Sleman</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS
        ================================================ -->
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{{ URL::to('/assets/user/css/owl.carousel.css')}}">
        <!-- bootstrap.min css -->
        <link rel="stylesheet" href="{{ URL::to('/assets/user/css/bootstrap.min.css')}}">
        <!-- Font-awesome.min css -->
        <link rel="stylesheet" href="{{ URL::to('/assets/user/css/font-awesome.min.css')}}">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="{{ URL::to('/assets/user/css/animate.min.css')}}">

        <link rel="stylesheet" href="{{ URL::to('/assets/user/css/main.css')}}">
        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href="{{ URL::to('/assets/user/css/responsive.css')}}">
         <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
        <!-- Js -->
    <script src="{{ URL::to('/assets/user/js/vendor/modernizr-2.6.2.min.js')}}"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="{{ URL::to("/assets/user/js/vendor/jquery-1.10.2.min.js")}}"><\/script>')</script>
    <script src="{{ URL::to('/assets/user/js/jquery.nav.js')}}"></script>
   <!-- <script src="js/jquery.sticky.js"></script> -->
    <script src="{{ URL::to('/assets/user/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::to('/assets/user/js/plugins.js')}}"></script>
    <script src="{{ URL::to('/assets/user/js/wow.min.js')}}"></script>
    <script src="{{ URL::to('/assets/user/js/main.js')}}"></script>
    <!-- bootstrap datepicker -->
<script src="{{ URL::to('/assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    </head>
    <body>
    <!--
    header-img start 
    ============================== -->
    <section id="hero-area" style="background-color: rgb(120, 163, 60);">
      <img class="img-responsive" src="{{ URL::to('/assets/user/images/header.png')}}" alt="">
    </section>
    <!--
    Header start 
    ============================== -->
    <nav id="navigation" style="background-color: rgba(129, 176, 61, 1);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block" style="background-color: rgba(129, 176, 61, 1);">
                        <nav class="navbar navbar-default">
                          <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>

                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav navbar-right" id="top-nav">
                                <li><a href="{{ URL::to('/')}}">Home</a></li>
                                <li><a href="{{ URL::to('/dokumen')}}">Dokumen</a></li>
                               @if (Auth::guard('user')->check())
                               <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::guard('user')->user()->username}}</a>
                               <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}">LOGOUT</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {!! csrf_field()!!}
                                    </form>
                               </li> 
                               </ul>
                               </li>   
                                @elseif (Auth::guard('pimpinan')->check())                                
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::guard('pimpinan')->user()->username}}</a>
                               <ul class="dropdown-menu">
                               <li><a href="{{ URL::to('/pimpinan/dashboard')}}">DASHBOARD</a></li>
                                <li>
                                    <a href="{{ route('logout') }}">LOGOUT</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {!! csrf_field()!!}
                                    </form>
                               </li> 
                               </ul>
                               </li>   
                                @elseif (Auth::guard('admin')->check())
                                
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::guard('admin')->user()->username}}</a>
                               <ul class="dropdown-menu">
                               <li><a href="{{ URL::to('/admin/dashboard')}}">DASHBOARD</a></li>
                                <li>
                                    <a href="{{ route('logout') }}">LOGOUT</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {!! csrf_field()!!}
                                    </form>
                               </li> 
                               </ul>
                               </li>   
                                @else
                                <li><a href="{{ URL::to('/register')}}">Register</a></li>
                                <li> <a href="{{ URL::to('/login')}}">Login</a></li>
                                @endif
                              </ul>
                            </div><!-- /.navbar-collapse -->
                          </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </nav><!-- header close -->