@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit de Bio Data</h1>
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

          <form action="{{route('biodata.update',$usuario->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12">
                <strong>Name :</strong>
                <input type="text" name="formName" class="form-control" value="{{$usuario->name}}">
                <div style="margin-top: 15px;"></div>
              </div>

              <div class="col-md-12">
                <strong>Email :</strong>
                <input type="text" name="formEmail" class="form-control" value="{{$usuario->email}}">
                <div style="margin-top: 15px;"></div>
              </div>

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
                </div>
                <div style="margin-top: 25px;"></div>
              </div>

              <div class="col-md-12">
                <a href="{{route('biodata.index')}}" class="btn btn-sm btn-success">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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