@extends('layouts.master')

@section('content')


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
    <div class="col-12">

      <div class="card col-12">

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
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
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="input-email" name="email" value="{{ old('email') }}" required>

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

@endsection