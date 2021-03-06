@extends('layouts.app_reset')

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6">
            <div style="margin-top:70px;"></div>
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1><br>
                                    <p class="mb-4">Nós entendemos, coisas acontecem. Basta digitar seu endereço de e-mail abaixo e nós lhe enviaremos um link para redefinir sua senha!</p>
                                </div>
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group">


                                        <div class="col-md-12">

                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Insira o endereço de e-mail...">

                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div style="margin-top: 30px;"></div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-2 col-form-label text-md-right"></label>
                                        <div class="col-md-8 ">
                                            <button type="submit" class="btn btn-info btn-user btn-block">
                                                {{ __('Redefinir Senha') }}
                                            </button>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-1 col-form-label text-md-right"></label>
                                        <div class="col-md-10">
                                            @if (Route::has('login'))

                                            <b><a class="nav-link btn-outline-light btn btn-link " href="{{ route('login') }}">{{ __('Já tem uma conta? Entrar!') }}</a></b>

                                            @endif

                                        </div>

                                    </div>
                                    <div class="col-md-12 ">
                                        <hr>
                                    </div>

                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection