@extends('layouts.master')

@section('content')

<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div style="margin-top: 20px;"></div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @can('isAdmin')
            <h1 class="h3 mb-0 text-gray-800">ADMINISTRAÇÃO</h1>
            @endcan
            @can('isServidor')
            <h1 class="h3 mb-0 text-gray-800">SERVIDOR</h1>
            @endcan
            @can('isInterprete')
            <h1 class="h3 mb-0 text-gray-800">INTÉRPRETE</h1>
            @endcan
            @can('isGestordepartemento')
            <h1 class="h3 mb-0 text-gray-800">GESTOR DEPARTEMENTO</h1>
            @endcan
            @can('isAudiovisual')
            <h1 class="h3 mb-0 text-gray-800">AUDIO VISUAL</h1>
            @endcan
            @can('isUser')
            <h1 class="h3 mb-0 text-gray-800">USUÁRIO COMUM</h1>
            @endcan
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div style="margin-top:100px;">
            <center>
                <img class="img-profile " style="" src="{{ url('img/preview.png') }}">
            </center>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->



@endsection