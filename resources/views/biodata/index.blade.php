@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Lista de Bio Data</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-12">

      <div style="margin-top: 50px;"></div>

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
              <th width="50px"><b>No.</b></th>
              <th width="300px">Nome</th>
              <th>Email</th>
              <th>Tipos</th>
              <th width="180px">Ação</th>
            </tr>

            @foreach ($usuarios as $usuario)
            <tr>
              <td><b>{{++$i}}.</b></td>
              <td>{{$usuario->name}}</td>
              <td>{{$usuario->email}}</td>
              <td>{{$usuario->user_type}}</td>
              <td>
                <form action="{{ route('biodata.destroy', $usuario->id) }}" method="post">
                  <a class="btn btn-sm btn-success" href="{{route('biodata.show',$usuario->id)}}">Show</a>
                  <a class="btn btn-sm btn-warning" href="{{route('biodata.edit',$usuario->id)}}">Edit</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>

          {!! $usuarios->links() !!}
        </div>

        <div style="margin-top: 30px;"></div>
      </div>
    </div>
    <div style="margin-top: 90px;"></div>
  </div>
</div>


  @endsection