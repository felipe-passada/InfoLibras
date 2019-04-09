@extends('layouts.master')

@section('content')

<!-- Main Content -->
<div id="content">



  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">QR CODE</h1>
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

              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Vídeo</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Cor</label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">Preto</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">Azul</label>
                    </div>

                  </div>
                </div>

              </div>

              <div class="row">

                <div class="col-10">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea3">Descrição</label>
                    <textarea class="form-control" id="exampleFormControlTextarea3" rows="7"></textarea>
                  </div>
                </div>


              </div>


              <div style="margin-top: 30px;"></div>

              <div class="form-group row">
                <label for="password-confirm" class=" col-form-label text-md-right"></label>
                <div class="col-md-3 ">
                  <button type="submit" class="btn btn-info btn-user btn-block">
                    {{ __('Cria Qr Code') }}
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