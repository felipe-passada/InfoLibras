@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Solicitações de tradução <i class="fas fa-sign-language"></i>
</h1>
    </div>
    <hr class="text-gray-800">    
    
    <div class="row">
    @foreach ($solicitations as $solicitation)
      <div class="col-xl-4 col-md-12 mb-4">
        @if($solicitation->status == "waiting")

          <div class="card border-left-primary shadow h-100 py-2 mt-3">
            <div class="card-body">
              <div class="card-title">
                <div class="h6 mb-0 font-weight-bold text-primary">Titulo: Informações Biblioteca</div>
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs text-gray-800 mb-1"> <p><b>Descrição:</b> {{ $solicitation->description }}</p> </div>
                  <div class="text-xs text-gray-800 mb-1">Departamento: Biblioteca</div>
                </div>
                <div class="col-auto">
                  <a href="{{route('solicitacao.show',$solicitation->id)}}">
                    <i class="fas fa-info-circle fa-2x text-gray-500"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endif

        @if($solicitation->status == "working")
          <div class="card border-left-warning shadow h-100 py-2 mt-3">
            <div class="card-body">
              <div class="card-title">
                <div class="h6 mb-0 font-weight-bold text-warning">Titulo: Informações Biblioteca</div>
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs  text-gray-800 mb-1"> <p><b>Descrição:</b> {{ $solicitation->description }}</p> </div>
                  <div class="text-xs text-gray-800 mb-1"> <b>Departamento:</b> Secretaria</div>
                </div>
                <div class="col-auto">
                  <a href="{{route('videos.update', $solicitation->video_id)}}">
                  <i class="fas fa-info-circle fa-2x text-gray-500"></i>
                  </a>   
                </div>
              </div>
            </div>
          </div>
        @endif

        @if($solicitation->status == "finished")
          <div class="card border-left-success shadow h-100 py-2 mt-3">
            <div class="card-body">
              <div class="card-title">
                <div class="h6 mb-0 font-weight-bold text-success">Titulo: Informações Biblioteca</div>
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-gray-800 mb-1 mt-1">Descrição: INOIOISJOAIJSA</div>
                  <div class="text-xs font-weight-bold text-gray-800 mb-1">Departamento: Ensino</div>
                </div>
                <div class="col-auto">
                  <a href="">
                    <i class="fas fa-info-circle fa-2x text-gray-500"></i>
                  </a>
                </div>
              </div>
            </div>
        @endif
      
      </div>
    @endforeach

@endsection