@extends('layouts.main')
@section('content')
     
    <div class="site-section">
      <div class="container">
        <h3 class="display-4 text-center">Employer Registration</h3>
            @if(Session::has('message'))
              <div class="alert alert-success">
                {{Session::get('message')}}
              </div>
            @endif
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
            
            <form method="POST" action="{{ route('emp.register') }}" class="p-5 bg-white">
                        @csrf

                        {{-- inserting user_type data --}}
                        <input type="hidden" value="employer" name="user_type">
                        <div class="form-group row">
                        {{-- end here --}}

                            <div class="col-md-12">Company Name</div>

                            <div class="col-md-12">
                                <input id="cname" type="text" placeholder="Company Name" class="form-control @error('cname') is-invalid @enderror" 
                                name="cname" value="{{ old('cname') }}" required autocomplete="cname" autofocus>

                                @error('cname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                    
                            <div class="col-md-12">Email</div>

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="email" class="form-control @error('email') is-invalid 
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
                                <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">Confirm password</div>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                                required autocomplete="new-password">
                            </div>
                        </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Register as Employer" id="bodybtn" class="btn btn-primary  py-2 px-5">
                </div>
              </div>

  
            </form>
          </div>

          <div class="col-lg-4">
            
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Once you create an account a verification link will be sent to your email.</p>
              <p><a href="#" id="bodybtn" class="btn btn-primary  py-2 px-4">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection