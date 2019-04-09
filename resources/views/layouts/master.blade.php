<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Home</title>


  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="page-top">
  <div id="app">


    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow">

        <a class="navbar-brand"><img class="img-profile " style="width: 240px; height: 70px;" src="{{ url('img/Guarulhos-02.jpg') }}">
        </a>

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>



          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->


          <li class="nav-item dropdown no-arrow">
            @guest
          <li class="nav-item">
            <b><a class="nav-link btn-outline-light" style="color: #414141;" href="{{ route('login') }}">{{ __('Login') }}</a></b>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <b><a class="nav-link btn-outline-light " style="color: #414141;" href="{{ route('register') }}">{{ __('Register') }}</a></b>
          </li>
          @endif
          @else
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
              {{ Auth::user()->name }} <span class="caret"></span>
            </span>
            <img class="img-profile rounded-circle" src="{{ url('img/avatar5.png') }}">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <!-- <a class="dropdown-item" href="#">
                                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                      Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                      Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                      Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div> -->
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">

              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>

          </div>
          </li>

          @endguest
        </ul>

      </nav>
      <!-- End of Topbar -->


    </div>

    <div id="wrapper">

      <ul class="navbar-nav bg-gradient  sidebar sidebar-dark accordion" style="background-color: #70C834;" id="accordionSidebar">


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">

          @if (Route::has('home'))
          <a class="nav-link" href="{{ route('home') }}">
            <i class="fa fa-fw fa-home" aria-hidden="true"></i>
            <span>Home</span>
          </a>
          @endif

        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>


        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item" data-widget="tree">
          @can('isAdmin')
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Configurações</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Configurações:</h6>

              @if (Route::has('usuario'))
              <a class="collapse-item" href="{{ route('usuario') }}">
                <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                <span>Usuário</span>
              </a>
              @endif

              <!-- <a class="collapse-item" href="">
                <i class="fa fa-fw fa-qrcode" aria-hidden="true"></i>
                <span>QR Code</span>
              </a>

              <a class="collapse-item" href="">
                <i class="fa fa-fw fa-sign-language" aria-hidden="true"></i>
                <span>Intérprete</span>
              </a> -->

            </div>
          </div>
          @endcan

          @can('isServidor')
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Configurações</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Configurações:</h6>

              @if (Route::has('home'))
              <a class="collapse-item" href="">
                <i class="fa fa-fw fa-qrcode" aria-hidden="true"></i>
                <span>QR Code</span>
              </a>
              @endif
            </div>
          </div>

          @if (Route::has('solicitacao'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('solicitacao') }}">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Solicitação</span></a>
          </li>
          @endif
        @endcan

        @can('isInterprete')
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Vídeo</span></a>
        </li>
        <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Configurações</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Configurações:</h6>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
              <span>Usuário</span>
            </a>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-qrcode" aria-hidden="true"></i>
              <span>QR Code</span>
            </a>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-sign-language" aria-hidden="true"></i>
              <span>Intérprete</span>
            </a>

          </div>
        </div> -->
        @endcan

        @can('isGestordepartemento')
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Configurações</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Configurações:</h6>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
              <span>Usuário</span>
            </a>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-qrcode" aria-hidden="true"></i>
              <span>QR Code</span>
            </a>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-sign-language" aria-hidden="true"></i>
              <span>Intérprete</span>
            </a>

          </div>
        </div>
        @endcan

        @can('isAudiovisual')
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Configurações</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Configurações:</h6>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
              <span>Usuário</span>
            </a>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-qrcode" aria-hidden="true"></i>
              <span>QR Code</span>
            </a>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-sign-language" aria-hidden="true"></i>
              <span>Intérprete</span>
            </a>

          </div>
        </div>
        @endcan

        @can('isUser')
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Configurações</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Configurações:</h6>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
              <span>Usuário</span>
            </a>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-qrcode" aria-hidden="true"></i>
              <span>QR Code</span>
            </a>

            <a class="collapse-item" href="">
              <i class="fa fa-fw fa-sign-language" aria-hidden="true"></i>
              <span>Intérprete</span>
            </a>

          </div>
        </div>
        @endcan
        </li>

      </ul>
      <!-- End of Sidebar -->







      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <div class="py-0">

          @yield('content')
        </div>

        <div style="margin-top: 100px"></div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Desenvolvimento Web &copy; Infolibras 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>