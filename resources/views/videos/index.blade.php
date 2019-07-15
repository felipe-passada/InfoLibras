@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    @can('isAudiovisual')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
        Edição de videos<i class="fas fa-sign-language"></i>
      </h1>
    </div>
    @endcan

    @can('isServidor')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
        Videos<i class="fas fa-sign-language"></i>
      </h1>
    </div>
    @endcan

    <hr class="text-gray-800">    
    <div class="row">
    @foreach($videos as $video)

      <div class="col-xl-3 col-md-12 mb-4">
        <div class="card">
          <div class="card-img-top">
            <a href="{{$video->video}}" target="_blank">
              <img src="{{asset("storage/$video->thumbnail")}}" class="card-img-top" alt="...">
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title"><b>Titulo:</b> {{$video->titulo}}</h5>
            <p class="card-text"><b>Status:</b> {{$video->status}}</p>
            @can('isAudiovisual')
            <a href="{{route('videos.show',$video->id)}}" class="btn btn-primary">Detalhes</a>
            @endcan
          </div>
        </div>
      </div>
    @endforeach

@endsection