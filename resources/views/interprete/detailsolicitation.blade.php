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
                            <button id="showUpload" class="btn btn-sm btn-success">Traduzir <i class="fa fa-check-circle"></i></button>
                        </div>
                    </div>

                    <div id="upload" class="row mt-5" style="display:none;">
                        <div class="col-12 text-center">
                            <h1 class="h3 mb-4">Upload video de tradução</h1>
                        </div>
                        <form action="{{route('videos.store')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="title">Titulo do video:  <i class="fa fa-font"></i></label>
                                    <input type="text" name="title" class="form-control" value="" required="" autofocus="">
                                </div>
                            </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="link">Link do video: <i class="fa fa-video"></i></label>
                                    <input type="text" name="link" class="form-control" value="" required="" autofocus="">
                                    </div>
                                </div>
                                <div class="choose_file">
                                    <input name="img" type="file" accept="image/*"/>
                                    <span id="custom-text">Nenhum arquivo escolhido, ainda.</span>
                                </div>

                                <input name="solicitation" type="hidden" value="{{$solicitacao->id}}">

                                <div class="col-12 mt-5">
                                    <button type="submit" class="btn btn-success btn-lg">Enviar <i class="fa fa-check"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.onload = function() {
    $("#showUpload").click(function(){
        const upload = document.getElementById("upload");
        if (upload.style.display === 'block') {
            upload.style.display = 'none'
        } else {
            upload.style.display = 'block'
        }
    });
}

</script>
@endsection