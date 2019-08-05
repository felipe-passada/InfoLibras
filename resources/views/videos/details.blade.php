@extends('layouts.master')

@section('content')

<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="margin-top: 20px;"></div>
        <!-- Page Heading -->
        <div class="col-12">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-success">Detalhes do video</h6>
            </div>
            <div class="card-body bg-white">
                <div class="p-5">
                    <div class="row">
                        <div class="embed-responsive embed-responsive-16by9" style="max-height:350px;">
                            <iframe class="embed-responsive-item" src="{{$videos->video}}" allowfullscreen></iframe>
                        </div>
                    </div>
                        <hr>
                    <div id="upload" class="row mt-5">
                        <div class="col-12 text-center">
                            <h1 class="h3 mb-4">Upload video de tradução</h1>
                        </div>
                        <form action="{{route('videos.update', $videos->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="title">Titulo do video:  <i class="fa fa-font"></i></label>
                                    <input type="text" class="form-control" value="{{$videos->titulo}}" readonly>
                                </div>
                            </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="link">Link do video: <i class="fa fa-video"></i></label>
                                    <input type="text" name="link" class="form-control" value="{{$videos->video}}">
                                    </div>
                                </div>

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
@endsection