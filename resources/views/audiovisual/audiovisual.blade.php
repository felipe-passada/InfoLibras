@extends('layouts.admin.app_admin')

@section('content')


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient  sidebar sidebar-dark accordion" style="background-color: #70C834;" id="accordionSidebar">

      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        @if (Route::has('admin'))
              <a class="nav-link" href="{{ route('admin') }}">
                <i class="fa fa-fw fa-home" aria-hidden="true"></i>
                <span>Administração</span>
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
      <li class="nav-item">
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

            @if (Route::has('qrcode'))
              <a class="collapse-item" href="{{ route('qrcode') }}">
                <i class="fa fa-fw fa-qrcode" aria-hidden="true"></i>
          <span>QR Code</span>
        </a>
            @endif

            @if (Route::has('interprete'))
              <a class="collapse-item" href="{{ route('interprete') }}">
                <i class="fa fa-fw fa-sign-language" aria-hidden="true"></i>
          <span>Intérprete</span>
        </a>
            @endif
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

  

      
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       

        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<div style="margin-top: 20px;"></div>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">USUÁRIO</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="card col-12">

            <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <h6 class="heading-small text-muted mb-4">Cadastro</h6>
                <div class="pl-lg-4">

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nome</label>
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" class="form-control-label" id="input-username" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                         <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="input-email" name="email" value="{{ old('email') }}"  required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </div>
                    </div>
                  </div>



                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Senha</label>
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Confirme a Senha</label>
                        
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                         
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Tipo</label>
                            <select class="form-control">
                              <option>Administração</option>
                              <option>Funcionário</option>
                              <option>Interprete</option>
                              <option>Gestor Departamento</option>
                              <option>Audio Visual</option>
                              <option>Usuario comum</option>
                            </select>
                      </div>
                    </div>
                  </div>


                        <div style="margin-top: 30px;"></div>

                        <div class="form-group row">
                            <label for="password-confirm" class=" col-form-label text-md-right"></label>
                            <div class="col-md-3 ">
                                <button type="submit" class="btn btn-info btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </div>
                        <div style="margin-top: 27px;"></div>



              </form>
            </div>
          </div>
        </div>


         

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <div style="margin-top: 20px;"></div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

@endsection