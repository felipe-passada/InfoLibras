@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">EDIT DE QR CODE</h1>
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

          <form action="{{route('qrcode.update',$qrcode->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12">
                <strong>Titulo :</strong>
                <input type="text" name="formTitulo" class="form-control" value="{{$qrcode->title}}">
                <div style="margin-top: 15px;"></div>
              </div>

              <div class="col-md-12">
                <strong>Conteúdo :</strong>
                <input type="text" name="formConteudo" class="form-control" value="{{$qrcode->content}}">
                <div style="margin-top: 15px;"></div>
              </div>

              <div class="col-10">
                <div class="form-group">
                  <label for="exampleFormControlTextarea3"><strong>Description : </strong></label>
                  <textarea id="name" name="textareaDescricao" id="exampleFormControlTextarea3" rows="7" class="form-control">
                  {{$qrcode->description}}
                  </textarea>
                  <div style="margin-top: 20px;"></div>
                </div>
                <div style="margin-top: 25px;"></div>
              </div>

              <div class="col-md-12">
                <a href="{{route('qrcode.index')}}" class="btn btn-sm btn-success">De volta</a>
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