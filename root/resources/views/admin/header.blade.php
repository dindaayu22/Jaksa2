<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{!! csrf_token() !!}" />
  <link rel="icon" type="image/png') }}" href="{{ URL::to('/assets/img/logo-mini.png') }}">
  <title>Perpustakaan Kejaksaan Sleman</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
   <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ URL::to('/assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<!-- jQuery 3 -->
<script src="{{ URL::to('/assets/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::to('/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ URL::to('/assets/admin/bower_components/chart.js/Chart.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::to('/assets/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::to('/assets/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::to('/assets/admin/dist/js/demo.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{ URL::to('/assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>


  
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ URL::to('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      
      <span class="logo-mini"><img class="img-md"src="{{ URL::to('/assets/img/logo-mini.png') }}"></span>
      <!-- logo for regular state and mobile devices -->
      
      <span class="logo-lg"><img src="{{ URL::to('/assets/img/logo.png') }}"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL::to('/assets/img/user.png') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->username}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ URL::to('/assets/img/user.png') }}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->username}}
                </p>
              </li>              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {!! csrf_field() !!}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::to('/assets/img/user.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->username}}</p>
        </div>
      </div>
      <!-- search form -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if(Request::path()=="pimpinan/dashboard")
        <li class="active"><a href="{{ URL::to('/pimpinan/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        @else
        <li @if(Request::path()=="admin/dashboard") class="active" @endif><a href="{{ URL::to('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li @if(Request::path()=="admin/user") class="active" @endif><a href="{{ URL::to('/admin/user') }}"><i class="fa fa-user"></i><span>User</span></a></li>
        <li @if(Request::path()=="admin/dokumen" || Request::path()=="admin/kategori") class="active treeview-menu-open" @else class="treeview" @endif>
          <a href="#">
          <i class="fa fa-file"></i> 
          <span>Dokumen</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Request::path()=="admin/dokumen") class="active" @endif><a href="{{ URL::to('/admin/dokumen') }}"><i class="fa fa-circle-o"></i> Daftar Dokumen </a></li>
            <li @if(Request::path()=="admin/kategori") class="active" @endif><a href="{{ URL::to('/admin/kategori') }}"><i class="fa fa-circle-o"></i> Kategori </a></li>
          </ul>
        </li>
        @endif
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>