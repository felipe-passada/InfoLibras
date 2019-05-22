@extends('layouts.master')

@section('content')

<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">SOLICITAÇÃO</h1>
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
              <th width="50px"><b>#</b></th>
              <th width="230px">Descrição</th>
              <th></th>
              <th width="200px">Ação</th>
            </tr>

            @foreach ($solicitations as $solicitation)
            <tr>
              <td><b>{{++$i}}.</b></td>
              <td>{{$solicitation->description}}</td>
              <td></td>

              <td>
                <form action="{{ route('solicitacao.destroy', $solicitation->id) }}" method="post">
                  <a class="btn btn-sm btn-secondary" href="{{route('solicitacao.show',$solicitation->id)}}">
                    <i class="fas fa-info-circle fa-sm" style="font-size: 14px;"></i>
                  </a>

                  
                </form>
              </td>
            </tr>
            @endforeach
          </table>

          {!! $solicitations->links() !!}
        </div>

        <div style="margin-top: 30px;"></div>
      </div>
    </div>
    <div style="margin-top: 90px;"></div>
  </div>
</div>



@endsection