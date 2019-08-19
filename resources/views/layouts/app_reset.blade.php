<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Reset Password</title>

  <link href="{{secure_asset('css/app.css')}}" rel="stylesheet">
  <link href="{{secure_asset('js/app.js')}}">
</head>

<body class="bg-gradient" style="background-image: url('/img/background.jpg');">
  <div id="app">


    <!-- Main Content -->
    <div id="content">


    </div>

    <div class="py-0">
      @yield('content')
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>

</html>