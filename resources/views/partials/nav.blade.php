<div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="/">Job<strong class="font-weight-bold">Site</strong> </a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li><a href="{{ route('register') }}">For Job Seeker</a></li>
                      <li>
                        <a href="{{route('employerRegister')}}">For Employees</a>
                      </li>
                      <li><a href="contact.html">Contact</a></li>
                      {{-- <li><a href="new-post.html"><span class="bg-primary text-white py-3 px-4 rounded">
                        <span class="icon-plus mr-3"></span>Post New Job</span></a></li> --}}
                     
                        @if (!Auth::check())
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary text-white py-3 px-4 rounded" data-bs-toggle="modal" 
                        data-bs-target="#exampleModal">
                          Get Access
                        </button>
                        @else
                        <a class="btn btn-primary text-white py-3 px-4 rounded" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      @endif

                    </ul>

                     
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="icon-close2 js-menu-toggle" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="row mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                  <div class="col-md-12">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                      value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="row mb-3">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                  <div class="col-md-12">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="row mb-3">
                  <div class="col-md-12 offset-md-4">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                          <label class="form-check-label" for="remember">
                              {{ __('Remember Me') }}
                          </label>
                      </div>
                  </div>
              </div>
          
          </div>
          <div class="modal-footer">
            @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
            @endif
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if (!Auth::check())
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
                @else
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                @endif

          </form>
          </div>
        </div>
      </div>
      
    </div>
    