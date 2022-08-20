@extends('layouts.main')
@section('content')

<div class="site-section">
<div class="container">

            {{-- <h3 class="display-4 text-center">LOGIN</h3> --}}
            <div class="row">
                <!-- error message for email verification -->
                @if (Session::has('message'))
                    <div class="alert alert-success">
                    {{Session::get('message')}}
                    </div>
                @endif
        
                <div class="col-md-6 mb-5 align-self-center">
                    <form method="POST" action="{{ route('login') }}" class="p-5 bg-white">
                                @csrf
                                                 
                                <div class="form-group row">
                                    <div class="col-md-12">Email</div>        
                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid 
                                        @enderror" name="email" 
                                        value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                            
                                    <div class="col-md-12">Password</div>
                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary py-2 px-5" id="bodybtn">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" id="bodylink" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                    </form>
                </div>

                <div class="col-md-5 img-border align-self-center">
                    <a href="https://vimeo.com/" class="popup-vimeo image-play">
                     
                      <span class="icon-wrap">
                        <span class="icon icon-play"></span>
                      </span>
                      <img src="external/images/hero_2.jpg" alt="Image" class="img-fluid rounded">
                    </a>
                  </div>

            </div>
    
</div>
</div>
@endsection
