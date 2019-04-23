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
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{$message}}</p>
        </div>
        @endif

        <div class="card-body">
          <form method="POST" action="{{ route('cadastrarUsuario') }}">
            <!-- {{ csrf_field() }} -->
            @csrf
            <h6 class="heading-small text-muted mb-4">Cadastro</h6>
            <div class="pl-lg-4">

              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Nome</label>
                    <input id="name" name="formNome" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" class="form-control-label" id="input-username" value="{{ old('name') }}" required autofocus>

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
                    <input id="email" name="formEmail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="input-email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div>

              <!-- <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">GU</label>
                    <input id="gu" type="gu" class="form-control{{ $errors->has('gu') ? ' is-invalid' : '' }}" id="input-email" name="gu" value="{{ old('gu') }}" required>

                    @if ($errors->has('gu'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('gu') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div> -->


              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Senha</label>
                    <input id="password" name="formPassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>

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
                    <select class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" name="formUserType" required id="user_type" type="user_type">
                      <option name="tipo" value="admin" type="admin">Administração</option>
                      <option name="tipo" value="servidor" type="servidor">Funcionário</option>
                      <option name="tipo" value="interprete" type="interprete">Interprete</option>
                      <option name="tipo" value="gestordepartemento" type="gestordepartemento">Gestor Departamento</option>
                      <option name="tipo" value="audiovisual" type="audiovisual">Audio Visual</option>
                      <option name="tipo" value="user" type="user">Usuario comum</option>
                    </select>

                    @if ($errors->has('user_type'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('user_type') }}</strong>
                    </span>
                    @endif

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