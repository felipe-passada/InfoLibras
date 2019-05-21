@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">EDIT DE APROVAR</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-12">

      <div style="margin-top: 50px;"></div>

      <div class="card-body bg-white">

        <div style="margin-top: 20px;"></div>

        <div class="pl-lg-3">

          @if ($errors->any())
          <div class="alert alert-danger">
            <strong>Ops! </strong> lá onde alguns problemas com sua entrada.<br>
            <ul>
              @foreach ($errors as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{route('aprovar.update',$sugestion->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">


              <div class="col-md-12">
                <div class="form-group">
                  <strong>Nome : </strong> {{$sugestion->user_id}}
                  <div style="margin-top: 20px;"></div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">Status</label>
                  <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="formStatus" required id="status" type="status">
                    <option name="status" value="hold" type="hold">Em espera</option>
                    <option name="status" value="aproved" type="aproved">Aprovado</option>
                    <option name="status" value="refused" type="refused">Negado</option>
                  </select>
                </div>
                <div style="margin-top: 25px;"></div>
              </div>

              <div class="col-10">
                <fieldset disabled>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea3"><strong>Description : </strong></label>
                    <textarea id="name" name="textareaDescricao" id="exampleFormControlTextarea3" rows="7" class="form-control">
                    {{$sugestion->description}}
                    </textarea>
                    <div style="margin-top: 20px;"></div>
                  </div>
                  <div style="margin-top: 25px;"></div>
                </fieldset>
              </div>

              <div class="col-md-12">
                <a href="{{route('aprovar.index')}}" class="btn btn-sm btn-success">De volta</a>
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