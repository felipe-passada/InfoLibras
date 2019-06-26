@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">APROVAR SUGESTÕES</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-12">

      <div style="margin-top: 30px;"></div>

      <div class="card-body bg-white">

        <div class="pl-lg-2">

          <div style="margin-top: 20px;"></div>


          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{$message}}</p>
          </div>
          @endif

          <div style="margin-top: 30px;"></div>

          <table class="table table-hover table-sm">
            <tr>
              <th width="50px" ><b>#</b></th>
              <th width="230px">Usuario</th>
              <th width="230px">Descrição breve</th>
              <th width="230px">Descrição detalhada</th>
              <th>Status</th>
              <th width="200px">Ação</th>
            </tr>

            @foreach ($sugestions as $sugestion)
            <tr>
              <td>{{$sugestion->id}}</td>
              <td>{{$sugestion->name}}</td>
              <td>{{$sugestion->title}}</td>
              <td>{{$sugestion->description}}</td>
              <td>{{$sugestion->status}}</td>

              <td>
                <form action="{{ route('aprovar.destroy', $sugestion->id) }}" method="post">
                  <a class="btn btn-sm btn-secondary" href="{{route('aprovar.show',$sugestion->id)}}">
                    <i class="fas fa-info-circle fa-sm" style="font-size: 14px;"></i>
                  </a>
                  <a class="btn btn-sm btn-primary" href="{{route('aprovar.edit',$sugestion->id)}}">
                    <i class="fas fa-edit fa-sm" style="font-size: 14px;"></i>
                  </a>
                  @csrf
                  <!-- @method('DELETE')
                  <button type=" submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt fa-sm" style="font-size: 14px;"></i>
                  </button> -->
                </form>
              </td>
            </tr>
            @endforeach
          </table>
          
        </div>

        <div style="margin-top: 30px;"></div>
      </div>
    </div>
    <div style="margin-top: 90px;"></div>
  </div>
</div>


@endsection