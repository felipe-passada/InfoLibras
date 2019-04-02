@extends('layouts.app_register')

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
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" class="form-control form-control-user" id="exampleFirstName" name="name" value="{{ old('name') }}" placeholder="Nome" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Endereço de e-mail" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme a Senha" required>
                            </div>
                        </div>

                        <div style="margin-top: 30px;"></div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right"></label>
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-info btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </div>
                        <div style="margin-top: 27px;"></div>

                        <div class="form-group row">
                                 <label for="password-confirm" class="col-md-1 col-form-label text-md-right"></label>                  
                                <div class="col-md-10 ">
                                    
                                    @if (Route::has('password.request'))
                                        <a class="nav-link btn-outline-light btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu sua senha?') }}
                                        </a>
                                    @endif
                                    
                                </div>
                         </div>      
                         <div class="form-group row"> 
                            <label for="password-confirm" class="col-md-1 col-form-label text-md-right"></label>
                                <div class="col-md-10">
                                    @if (Route::has('auth.login'))
                                            
                                               <b><a class="nav-link btn-outline-light btn btn-link " href="{{ route('auth.login') }}">{{ __('Já tem uma conta? Entrar!') }}</a></b>
                                           
                                        @endif
                                       
                                </div>

                        </div>
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
  <div style="margin-top: 70px;"></div>

@endsection
