@extends('layouts.master')

@section('content')
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div style="margin-top: 20px;"></div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">CRIA UM DE USUARIO</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="col-12">

            <div style="margin-top: 50px;"></div>

            <div class="card-body bg-white">

                <div style="margin-top: 20px;"></div>

                <div class="pl-lg-3">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops! </strong> there where some problems with your input.<br>
                        <ul>
                            @foreach ($errors as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{route('admin.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Nome</label>
                                    <input id="name" name="formNome" type="text" class="form-control{{ $errors->has('formNome') ? ' is-invalid' : '' }}" class="form-control-label" id="input-username" value="{{ old('formNome') }}" required autofocus>

                                    @if ($errors->has('formNome'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('formNome') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input id="email" name="formEmail" type="email" class="form-control{{ $errors->has('formEmail') ? ' is-invalid' : '' }}" id="input-email" value="{{ old('formEmail') }}" required>

                                    @if ($errors->has('formEmail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('formEmail') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Senha</label>
                                    <input id="password" name="formPassword" type="password" class="form-control{{ $errors->has('formPassword') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('formPassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('formPassword') }}</strong>
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
                                    <select class="form-control{{ $errors->has('formUserType') ? ' is-invalid' : '' }}" name="formUserType" required id="user_type" type="text">
                                        <option name="tipo" value="admin" type="admin">Administração</option>
                                        <option name="tipo" value="servidor" type="servidor">Funcionário</option>
                                        <option name="tipo" value="interprete" type="interprete">Interprete</option>
                                        <option name="tipo" value="gestordepartemento" type="gestordepartemento">Gestor Departamento</option>
                                        <option name="tipo" value="audiovisual" type="audiovisual">Audio Visual</option>
                                    </select>
                                </div>
                                <div style="margin-top: 25px;"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{route('admin.index')}}" class="btn btn-sm btn-success">De volta</a>
                                <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div style="margin-top: 40px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection