@extends('layouts.master')

@section('content')

<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="margin-top: 20px;"></div>
        <!-- Page Heading -->
        <div class="col-12">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-success">Solicitação de tradução</h6>
            </div>
            <div class="card-body bg-white">
                <div class="p-5">
                    <div class="row">
                        <div class="col-10">
                            <h2>Assunto: Tradução</h2>
                            <h2>Descrição breve: {{ $solicitacao->title }}</h2>
                            <p> <b>Descrição detalhada</b> {{ $solicitacao->description }} </p>

                            <p> <b>Categoria: </b> Traducao de Informações </p>
                            <p> <b>Area:</b> Biblioteca </p>
                        </div>

                        <div class="col-md-12 mt-5">
                            <a href="{{route('solicitacao.index')}}" class="btn btn-sm btn-danger">Voltar <i class="fa fa-chevron-circle-left"></i></a>
                            <button id="traduzir" class="btn btn-sm btn-success">Traduzir <i class="fa fa-check-circle"></i></button>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <h1 class="h3 text-gray-900 mb-4">Upload video de tradução</h1>
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="title">Titulo do video:</label>
                                    <input type="text" name="title" class="form-control" value="" required="" autofocus="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="title">Descrição breve:</label>
                                    <input type="text" name="title" class="form-control" value="" required="" autofocus="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="file" id="real-file" hidden="hidden" />
                                    <button type="button" id="custom-button" class="btn">Escolhar um arquivo</button>
                                    <span id="custom-text">Nenhum arquivo escolhido, ainda.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div style="margin-top: 90px;"></div>
    </div>
</div>
@endsection