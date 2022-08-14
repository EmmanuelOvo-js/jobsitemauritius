<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    {{-- Add this class to make nav scroll: site-navbar-wrap --}}
    <div class="site-navbar-wrap js-site-navbar bg-white">
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                {{-- <h2 class="mb-0 site-logo"><a href="/">Job<strong class="font-weight-bold">Site</strong> </a></h2> --}}
                <a href="/"><img src="/storage/uploads/Jobsite-logo.png" width="170"></a>
              </div>
              
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">

                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li><a href="{{route('company')}}">All Companies</a></li>  
                      <li><a href="#">Contact</a></li>
                      <li><a href="#">About Us</a></li>
                      @if(!Auth::check())

                      <li>
                          <div class="dropdown">
                            <a class="btn btn-success dropdown-toggle" type="button" 
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">Become a Member</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('register') }}">Job Seeker</a>
                              <a class="dropdown-item" href="{{route('employerRegister')}}">Employees</a>
                            </div>
                        </div>
                      </li>
                          
                        
                        @else
                        <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{-- if the logged in user is employer then show company name else show seeker --}}
                          @guest
                                  @if(Auth::user()->user_type='employer')
                                      {{Auth::user()->company->cname}}
                                  @endif
                              @else
                                  {{ Auth::user()->name }}
                          @endguest
                              
                          </a>

                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                             
                              @if(Auth::user()->user_type==='employer')
                                  <a class="dropdown-item" href="{{ route('company.view') }}">
                                              {{ __('Company Profile') }} </a>

                                  <a class="dropdown-item" href="{{route('job.create')}}">
                                              {{ __('Post Job') }} </a>

                                  <a class="dropdown-item" href="{{ route('my.jobs') }}">
                                              {{ __('My jobs') }} </a>

                                  <a class="dropdown-item" href="{{ route('applicant') }}">
                                              {{ __('Applicants') }} </a>

                              @elseif(Auth::user()->user_type==='seeker')

                                  <a class="dropdown-item" href="/profile">
                                          {{ __('Profile') }} </a>

                                  <a class="dropdown-item" href="/home">
                                          {{ __('Saved Jobs') }} </a>
                                  
                              @elseif(Auth::user()->user_type==='admin')
                                  <a class="dropdown-item" href="/home">Dashboard</a>
                                  <a class="dropdown-item" href="/dashboard/create">Create post</a>
                                  <a class="dropdown-item" href="/dashboard/trash">Trash</a>
                                  <a class="dropdown-item" href="/testimonial">View Testimonial</a>
                                  <a class="dropdown-item" href="/testimonial/create">Create Testimonial</a>
                                  <a class="dropdown-item" href="/dashboard/jobs">View Jobs</a>
                                  @else
                              @endif
                          </div>
                        </li>
                      @endif
                        
                        {{-- <li><a href="new-post.html"><span class="bg-primary text-white py-3 px-4 rounded">
                          <span class="icon-plus mr-3"></span>Post New Job</span></a></li> --}}
                          

                        @if (!Auth::check())
                          {{-- Add this: py-3 px-4 to increase button size --}}
                          {{-- Show Gain Access if user is not logged in --}}
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary text-white rounded" data-bs-toggle="modal"  
                          data-bs-target="#exampleModal">
                            Login
                          </button>
                          @else

                          {{-- show logout if user is logged in --}}
                          <a class="btn btn-primary text-white rounded" href="{{ route('logout') }}"
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
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="icon-close2" data-bs-dismiss="modal" aria-label="Close"></button>
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

                @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if (!Auth::check())
                  <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                @else
                
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>  
                @endif

              </form>
            
            </div>

            {{-- <div class="modal-footer">
            </div> --}}
          </div>
        </div> 
      </div>
</div>
    