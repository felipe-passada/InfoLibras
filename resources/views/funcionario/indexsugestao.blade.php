@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">SUGESTÃO</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="col-sm-2">
    </div>

    <div class="col-12">

      <div class="card-body bg-white">
        <div class="p-5">

          <div class="text-center">
            <h1 class="h3 text-gray-900 mb-4">Fazer uma sugestão</h1>
          </div>

          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{$message}}</p>
          </div>
          @endif

          <form action="{{route('sugestao.store')}}" method="post">
            @csrf

            <div class="row">

              <div class="col-12">
                <div class="form-group">
                  <label for="title">Descrição breve:</label>
                  <input type="text" name="title" class="form-control{{ $errors->has('textareaDescricao') ? ' is-invalid' : '' }}" class="form-control-label" value="{{ old('textareaDescricao') }}" required autofocus>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label for="exampleFormControlTextarea3">Descrição detalhada:</label>
                  <textarea id="textareaDescricao" name="textareaDescricao" id="exampleFormControlTextarea3" rows="5" class="form-control{{ $errors->has('textareaDescricao') ? ' is-invalid' : '' }}" class="form-control-label" value="{{ old('textareaDescricao') }}" required autofocus></textarea>

                  @if ($errors->has('textareaDescricao'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('textareaDescricao') }}</strong>
                  </span>
                  @endif

                </div>
              </div>
              <!-- <div class="col-12">
                <select class="custom-select">
                  <option selected>Selecione a área do campus</option>
                  <option value="1">Traduzir uma informação</option>
                  <option value="2">Melhorar um tradução</option>
                  <option value="3">Fazer uma sugestão de melhoria</option>
                </select>
              </div>
            </div> -->

            <div class="row mt-5">
              <div class="col-md-12">
                <button type="submit" class="btn btn-lg btn-success">Enviar</button>
              </div>
            </div>
          </form>

          </div>
        </div>
    </div>
    <div style="margin-top: 90px;"></div>
  </div>
</div>


@endsection