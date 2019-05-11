@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">VIDEOS</h1>
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

          <form action="{{route('video.store')}}" method="post">
            @csrf
            
            <div class="pl-lg-4">

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Titulo</label>
                    <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" class="form-control-label" id="input-username" name="titulo" value="{{ old('titulo') }}" required autofocus>

                    @if ($errors->has('titulo'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('titulo') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

              </div>

              <div style="margin-top: 40px;"></div>

              <div class="">
                <input type="file" id="real-file" hidden="hidden" />
                <button type="button" id="custom-button" class="btn">Escolhar um arquivo</button>
                <span id="custom-text">Nenhum arquivo escolhido, ainda.</span>
              </div>

              <div style="margin-top: 48px;"></div>



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

    <script>
      const realFileBtn = document.getElementById("real-file");
      const customBtn = document.getElementById("custom-button");
      const customTxt = document.getElementById("custom-text");

      customBtn.addEventListener("click", function() {
        realFileBtn.click();
      });

      realFileBtn.addEventListener("change", function() {
        if (realFileBtn.value) {
          customTxt.innerHTML = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
          )[1];
        } else {
          customTxt.innerHTML = "Nenhum arquivo escolhido, ainda.";
        }
      });
    </script>

  </div>
</div>


@endsection