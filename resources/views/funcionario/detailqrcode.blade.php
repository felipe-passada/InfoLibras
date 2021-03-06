@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">DETALHE DE QR CODE</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-12">

      <div style="margin-top: 50px;"></div>

      <div class="card-body bg-white">

        <div style="margin-top: 30px;"></div>

        <div class="pl-lg-3">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <strong>Titulo : </strong> {{$qrcode->title}}
                <div style="margin-top: 20px;"></div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <strong>Conteúdo : </strong> {{$qrcode->content}}
                <div style="margin-top: 20px;"></div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <strong>Descrição : </strong>
                <textarea id="name" name="textareaDescricao" id="exampleFormControlTextarea3" rows="7" class="form-control">
                {{$qrcode->description}}
                </textarea>
                <div style="margin-top: 20px;"></div>
              </div>
              <div style="margin-top: 25px;"></div>
            </div>

            <div class="col-md-12">
              <a href="{{route('qrcode.index')}}" class="btn btn-sm btn-success">De volta</a>
            </div>
          </div>
        </div>
        <div style="margin-top: 40px;"></div>
      </div>
    </div>
    <div style="margin-top: 90px;"></div>
  </div>
</div>
@endsection