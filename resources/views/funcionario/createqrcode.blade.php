@extends('layouts.master')

@section('content')
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div style="margin-top: 20px;"></div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gerar QRCode</h1>
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Titulo do Video</label>
                                        <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" class="form-control-label" id="titulo" name="titulo" value="{{ old('titulo') }}" required autofocus>

                                        @if ($errors->has('titulo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="input-username">Video</label>
                                        
                                        <select class="custom-select" name="video" id="video">
                                            <option selected>Selecione o video</option>
                                            <option value="https://www.youtube.com/watch?v=WvQlhMjGo4M">BURACOS NEGROS, como eles surgem?</option>
                                            <option value="https://www.youtube.com/watch?v=ZMKjm41mwJk">Astronomia: Nascimento, Vida e Morte das estrelas</option>
                                            <option value="https://www.youtube.com/watch?v=NKMRtJYhZiU">Exploração do Sistema Solar 360: Parte VI - Marte</option>
                                        </select>

                                        @if ($errors->has('video'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('video') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-6">
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

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea3">Descrição</label>
                                        <textarea name="descricao" class="form-control" id="descricao" rows="4"></textarea>
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

                            <input type="hidden" id="servidor" value="1">

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