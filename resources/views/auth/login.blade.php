@extends('layouts.app_login')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6">
            <div style="margin-top:70px;"></div>
            <div class="card o-hidden border-0 shadow-lg ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group">


                                        <div class="col-md-12">
                                            <input id="email" type="email" autocomplete="off" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Insira o endereço de e-mail...">

                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">



                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">

                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                    </div>
                                    <div class="form-group ">
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox small ">
                                                <input type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="remember">{{ __('Lembre de mim') }}</label>



                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-2 col-form-label text-md-right"></label>
                                        <div class="col-md-8 ">
                                            <button type="submit" class="btn btn-info btn-user btn-block">
                                                {{ __('Entrar') }}
                                            </button>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-1 col-form-label text-md-right"></label>

                                        <div class="col-md-10 ">

                                            @if (Route::has('password.request'))

                                            <a class="nav-link btn-outline-light btn btn-link" href="{{ route('password.request') }}">
                                                Esqueceu sua senha?
                                            </a>
                                            @endif

                                        </div>
                                    </div>
                                    <!--                      <div class="form-group row"> 
                        <label for="password-confirm" class="col-md-1 col-form-label text-md-right"></label>
                            <div class="col-md-10">
                                @if (Route::has('register'))
                                        
                                           <b><a class="nav-link btn-outline-light btn btn-link " href="{{ route('register') }}">{{ __('Crie a sua conta aqui!') }}</a></b>
                                       
                                    @endif
                                   
                            </div>

                    </div> -->
                                    <div class="col-md-12 ">
                                        <hr>
                                    </div>

                                </form>

                                <hr>
                                <!--    <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div> -->
                                <!--                   <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection