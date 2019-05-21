@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">SOLICITAÇÃO</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="col-sm-2">
    </div>

    <div class="col-12">

      <div style="margin-top: 30px;"></div>

      <div class="card-body bg-white">

        <div class="pl-lg-2">

          <div style="margin-top: 20px;"></div>


          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{$message}}</p>
          </div>
          @endif

          <div style="margin-top: 30px;"></div>

          <form action="{{route('solicitacao.store')}}" method="post">
            @csrf

            <div class="row">
              <div class="col-10">
                <div class="form-group">
                  <label for="exampleFormControlTextarea3">Descrição</label>
                  <textarea id="name" name="textareaDescricao" id="exampleFormControlTextarea3" rows="7" class="form-control{{ $errors->has('textareaDescricao') ? ' is-invalid' : '' }}" class="form-control-label" id="input-username" value="{{ old('textareaDescricao') }}" required autofocus></textarea>

                  @if ($errors->has('textareaDescricao'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('textareaDescricao') }}</strong>
                  </span>
                  @endif

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
              </div>
            </div>
          </form>


        </div>

        <div style="margin-top: 30px;"></div>
      </div>
    </div>
    <div style="margin-top: 90px;"></div>
  </div>
</div>


@endsection