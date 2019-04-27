@extends('layouts.master')

@section('content')


<!-- Main Content -->
<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div style="margin-top: 20px;"></div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">USUÁRIO</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="col-12">

      <div class="card col-12">

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            
          </form>
        </div>
      </div>
    </div>




  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@endsection