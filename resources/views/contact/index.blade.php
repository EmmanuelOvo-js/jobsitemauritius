@extends('layouts.main')
@section('content')

<div class="site-blocks-cover overlay" style="background-image: url('external/images/contact.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12" data-aos="fade">
          <h1>Lorem Ipsum Help You Dollar sign <br> Jordan Lorem Ipsum</h1>
        </div>
      </div>
    </div>
</div>

<div class="site-section-jordan-sectionss">

  <div class="container">
    <div class="row">

      <div class="col-md-12 mb-5">
      
        <form method="POST" action="" class="p-5 bg-white">
          @csrf
  
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
                <div class="col-md-12">Message</div>
                <div class="col-md-12">
                      <textarea type="text" name="message" id="message" cols="30" rows="10" class="form-control @error('message') is-invalid 
                      @enderror">
                          {{ old('message') }}
                      </textarea>

                      @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
  
            <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Send Message" id="bodybtn" class="btn btn-primary  py-2 px-5">
            </div>
            </div>
  
  
        </form>
        
      </div>

    </div>
    
  </div>
    
</div>

@endsection