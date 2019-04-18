@extends('layouts.master')

@section('content')


<!-- Main Content -->
<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <style>
      #custom-button {
        padding: 6px;
        color: white;
        background-color: #148275;
        border-radius: 5px;
        cursor: pointer;
        width: 236px;
      }

      #custom-button:hover {
        background-color: #22a393;
      }

      #custom-text {
        margin-left: 10px;
        font-family: sans-serif;
        color: #aaa;
      }
    </style>

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">VÍDEO</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

      <div class="card col-12">

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <h6 class="heading-small text-muted mb-4">Cadastro</h6>
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

              <div class="form-group row">
                <label for="password-confirm" class=" col-form-label text-md-right"></label>
                <div class="col-3 ">
                  <button type="submit" class="btn btn-info btn-user btn-block">
                    {{ __('Enviar') }}
                  </button>
                </div>

              </div>
              <div style="margin-top: 48px;"></div>



          </form>
        </div>
      </div>
    </div>

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
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection