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
                <form action="{{route('solicitacao.update',$solicitacao->id)}}" method="post">
                @csrf
                @method('PUT')

                <div style="margin-top: 30px;"></div>

                <div class="pl-lg-3">

                    <div class="row">
                        <div class="col-10">
                            <h2>Assunto:</h2>
                            <p>
                                {{ $solicitacao->description }}
                            </p>

                            <p> <b>Categoria: </b> Traducao de Informações </p>
                            <p> <b>Area:</b> Biblioteca </p>
                        </div>

                        <div class="col-md-12 mt-5">
                            <a href="{{route('solicitacao.index')}}" class="btn btn-sm btn-danger">Voltar <i class="fa fa-chevron-circle-left"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Traduzir <i class="fa fa-check-circle"></i></button>
                        </div>
                    </div>
                </div>
                </form>
                <div style="margin-top: 40px;"></div>
            </div>
        </div>
        <div style="margin-top: 90px;"></div>
    </div>
</div>
@endsection