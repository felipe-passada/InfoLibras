@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">QR CODE</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="col-sm-2">
      <a class="btn btn-sm btn-success" href="{{ route('qrcode.create') }}">
        <i class="fas fa-plus"></i> Crie um novo qr code
      </a>
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
              <th width="50px"><b>No.</b></th>
              <th width="230px">Título</th>
              <th>Conteúdo</th>
              <th>QR Code</th>
              <th width="200px">Ação</th>
            </tr>

            @foreach ($qrcodes as $qrcode)
            <tr>
              <td><b>{{++$i}}.</b></td>
              <td>{{$qrcode->title}}</td>
              <td><img src="{{asset("storage/qrcodes/$qrcode->path".'.png')}}" style="height:100px;width:100px"></td>
              <td>{{$qrcode->content}}</td>

              <td>
                <form action="{{ route('qrcode.destroy', $qrcode->id) }}" method="post">
                  <a class="btn btn-sm btn-secondary" href="{{route('qrcode.show',$qrcode->id)}}">
                    <i class="fas fa-info-circle fa-sm" style="font-size: 14px;"></i>
                  </a>
                  <a class="btn btn-sm btn-primary" href="{{route('qrcode.edit',$qrcode->id)}}">
                    <i class="fas fa-edit fa-sm" style="font-size: 14px;"></i>
                  </a>
                  @csrf
                  @method('DELETE')
                  <button type=" submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt fa-sm" style="font-size: 14px;"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>

          {!! $qrcodes->links() !!}
        </div>

        <div style="margin-top: 30px;"></div>
      </div>
    </div>
    <div style="margin-top: 90px;"></div>
  </div>
</div>


@endsection