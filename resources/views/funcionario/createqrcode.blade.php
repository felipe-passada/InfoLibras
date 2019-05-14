@extends('layouts.master')

@section('content')
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div style="margin-top: 20px;"></div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">CRIA UM DE QR CODE</h1>
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

                    <form action="{{route('qrcode.store')}}" method="post">
                        @csrf
                        <div class="pl-lg-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Titulo</label>
                                        <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" class="form-control-label" id="input-username" name="formTitulo" value="{{ old('titulo') }}" required autofocus>

                                        @if ($errors->has('titulo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Conteúdo</label>
                                        <input id="conteudo" name="formConteudo" type="text" class="form-control{{ $errors->has('conteudo') ? ' is-invalid' : '' }}" name="conteudo" required>

                                        @if ($errors->has('conteudo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('conteudo') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea3">Descrição</label>
                                        <textarea name="textareaDescricao" class="form-control" id="exampleFormControlTextarea3" rows="7"></textarea>
                                    </div>
                                </div>


                            </div>


                            <div style="margin-top: 20px;"></div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('qrcode.index')}}" class="btn btn-sm btn-success">De volta</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                                </div>
                            </div>

                            <div style="margin-top: 27px;"></div>
                        </div>
                    </form>
                </div>
                <div style="margin-top: 40px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection