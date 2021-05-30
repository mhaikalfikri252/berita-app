@extends('layouts.auth')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                      <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                      <div class="col-lg-6">
                          <div class="p-5">
                              <div class="text-center">
                                  <h1 class="h4 text-gray-900 mb-4">Welcome !</h1>
                              </div>
                              <!-- Form Login -->
                              <form class="user" method="POST" action="{{ route('login')}} ">
                                @csrf
                                  <div class="form-group ">
                                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
                                          id="email" aria-describedby="emailHelp" value="{{ old('email') }}" required
                                          autocomplete="email" autofocus placeholder="Enter Email Address...">
                                          
                                          @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('Email atau Password Salah!') }}</strong>
                                            </span>
                                          @enderror
                                  </div>
                                  <div class="form-group ">
                                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" 
                                      name="password" id="password" aria-describedby="passwordHelp" autocomplete="current-password" 
                                      value="{{ old('password') }}" required placeholder="Password">
                                      
                                      @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('Email atau Password Salah!') }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                      <div class="custom-control custom-checkbox small">
                                          <input type="checkbox" class="custom-control-input" id="customCheck">
                                          <label class="custom-control-label" for="customCheck" 
                                          {{ old('remember') ? 'checked' : '' }}>
                                            Remember Me
                                          </label>
                                      </div>
                                  </div>
                                  <button class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                  </button>
                                  <hr>                              
                              </form>
                              <div class="text-center">
                                @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password ?') }}
                                    </a>
                                @endif
                              </div>
                              <div class="text-center">
                                <a class="small" href="{{ route('register') }}">
                                    {{ __('Create an Account !')}}
                                </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection


        