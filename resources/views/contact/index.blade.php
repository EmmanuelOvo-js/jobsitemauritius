@extends('layouts.main')
@section('content')

{{-- hero col --}}
<div class="jordan-hero-cover overlay" style="background-image: url('/external/images/contact.jpg');">
  <div class="container">
  <div class="row align-items-center">
      {{-- Search Form --}}
      <div class="col-md-12" data-aos="fade">
        <h1>Lorem Ipsum Help You Dollar sign <br> Jordan Lorem Ipsum</h1>
      </div>
      {{-- End Search Form --}}  
  </div>
  </div>
</div>
{{-- End of hero --}}

<div class="site-section-jordan-sectionss">

  <div class="container">
    <div class="row">

      <div class="col-md-12 mb-5">
      
        <form method="POST" action="{{route('mail.contact')}}" class="p-5 bg-white" enctype="multipart/form-data">
          @csrf
          
          {{-- Alert for contact form email --}}
          @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
          @endif

          @if(Session::has('err_message'))
              <div class="alert alert-danger">{{Session::get('err_message')}}</div>
          @endif

            <div class="form-group row">
  
                <div class="col-md-12">Select Company</div>
  
                  <div class="col-md-12">
                    <select id="lunchBegins" class="selectpicker" name="cname" data-live-search="true" data-live-search-style="begins" title="Select Company @error('email') is-invalid 
                    @enderror" >
                      <option value="">Select Company</option>

                      @foreach (App\Models\Company::all() as $company)
                          <option value="{{$company->cname}}">
                              {{$company->cname}}
                          </option>
                      @endforeach   
                    </select>
    
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
  
              <div class="col-md-12">Subject</div>

                <div class="col-md-12">
                    <input id="subject" type="text" placeholder="Subject" class="form-control @error('subject') is-invalid @enderror" 
                    name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>
  
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">How Can We Be of Help</div>
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

            <div class="form-group row">
                <div class="col-md-12">Screenshot</div>
                <div class="col-md-12">
                    <input type="file" name="screenshot" class="form-control @error('message') is-invalid 
                    @enderror"> 
                </div>

                @error('screenshot')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
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