@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" id="left-col">
                {{-- Profile Avatar --}}
                {{-- If user has not uploaded a profile img display default avatar else display uploaded image --}}
                @if (empty(Auth::user()->company->logo))
                    <img src="{{asset('avatar/serwman1.jpg')}}" class="rounded" alt="company logo" width="100%" style="width: 100%;">
                @else
                    <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" class="rounded" 
                    alt="company logo" width="100" style="width: 100%">
                @endif
            
                <form method="POST" action="{{route('logo')}}" enctype="multipart/form-data">
                    @csrf 
                    <br>
                    <input type="file" class="form-control" name="logo">
                    <br>
                    <button class="btn btn-dark" id="bodybtn" type="submit">Update</button>
                    @if ($errors->has('logo'))
                        <div class="error" style="color:red;">
                                {{$errors->first('logo')}}
                        </div>
                    @endif
                </form>
                {{-- END Profile Avatar --}}
                <br>
                {{-- cover photo --}}
                <form method="POST" action="{{route('cover.photo')}}" enctype="multipart/form-data">
                    @csrf
              
                    <div class="card j-card">
                        <div class="card-header j-card-head">Update Cover Photo</div>
                        <div class="card-body">                
                            <input type="file" class="form-control" name="cover_photo">                   
                            <br>
    
                            <button class="btn btn-dark float-end" id="bodybtn" type="submit">Update</button>
    
                            @if ($errors->has('cover_photo'))
                                <div class="error" style="color:red;">
                                        {{$errors->first('cover_photo')}}
                                </div>
                            @endif
                          
                        </div>
                    </div>
                </form>
                {{-- end of cover photo --}}
            </div>

            {{-- hero col --}}
            <div class="col-md-9" style="padding:0px!important;">
                <div class="jordan-hero-cover overlay" style="background-image: url('/external/images/contact.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
                    <div class="container">
                      <div class="row align-items-center">
                        <div class="col-12" data-aos="fade">
                            <h2>Welcome</h2>
                          <h1>{{Auth::user()->company->cname}}</h1>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="row" style="padding:3%;">
                    <div class="col-md-7">
                        {{-- Company info --}}
                        <div class="card j-card">
                            <div class="card-header j-card-head">Update Your Company Information</div>
                            <form action="{{route('company.store')}}" method="POST">
                                @csrf        
                                <div class="card-body j-card-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">
                                            {{Session::get('message')}}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" 
                                        value="{{Auth::user()->company->address}}">

                                            @if ($errors->has('address'))
                                                <div class="error" style="color:red;">
                                                    {{$errors->first('address')}}
                                                </div>
                                            @endif
                                            
                                    </div>

                                    &nbsp;
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="number" class="form-control" name="phone" value="{{Auth::user()->company->phone}}">

                                        @if ($errors->has('phone'))
                                            <div class="error" style="color:red;">
                                                {{$errors->first('phone')}}
                                            </div>
                                        @endif
                                    </div>

                                    &nbsp;
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" name="website" value="{{Auth::user()->company->website}}">

                                        @if ($errors->has('website'))
                                            <div class="error" style="color:red;">
                                                {{$errors->first('website')}}
                                            </div>
                                        @endif
                                    </div>

                                    &nbsp;
                                    <div class="form-group">
                                        <label for="slogan">Slogan</label>
                                        <input type="text" class="form-control" name="slogan" value="{{Auth::user()->company->slogan}}">

                                        @if ($errors->has('slogan'))
                                            <div class="error" style="color:red;">
                                                {{$errors->first('slogan')}}
                                            </div>
                                        @endif
                                    </div>

                                    &nbsp;
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">
                                            {{Auth::user()->company->description}}  
                                        </textarea>

                                        @if ($errors->has('description'))
                                            <div class="error" style="color:red;">
                                                {{$errors->first('description')}}
                                            </div>
                                        @endif
                                    </div>

                                    &nbsp;
                                    <div class="form-group">
                                        <button class="btn btn-dark" id="bodybtn" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- End of company info --}}
                    </div>
                    <div class="col-md-4">
                        {{-- Side About Company--}}
                        <div class="card j-card">
                            <div class="card-header j-card-head">About Your Company</div>
                            <div class="card-body j-card-body">
                            
                                {{-- try to solve this error later --}}
                                <p>Company Name: {{Auth::user()->company->cname}}</p>
                                <p>Company Address: {{Auth::user()->company->address}}</p>
                                <p>Company Phone Number: {{Auth::user()->company->phone}}</p>
                                <p>Company Website: {{Auth::user()->company->website}}</p>
                                <p><a id="bodylink2" href="company/{{Auth::user()->company->slug}}">View Company Page 
                                    <i class="fa fa-link"></i></a></p>

                            </div>
                        </div>
                        {{-- End side bar --}}
                    </div>
                </div>
            </div>
            {{-- end hero col --}}
        </div>
    </div>
@endsection