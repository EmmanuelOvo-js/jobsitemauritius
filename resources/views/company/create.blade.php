@extends('layouts.main')
@section('content')
<div class="site-section">

<div class="container">
    <div class="row">
        {{-- Profile Avatar --}}
        <div class="col-md-3">
            {{-- If user has not uploaded a profile img display default avatar else display uploaded image --}}
            @if (empty(Auth::user()->company->logo))
                <img src="{{asset('avatar/serwman1.jpg')}}" alt="" width="100%" style="width: 100%;">
            @else
                 <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" 
                 alt="" width="100" style="width: 100%">
            @endif
           
            <form method="POST" action="{{route('logo')}}" enctype="multipart/form-data">
                  @csrf
                <br>
                <div class="card">
                    <div class="card-header">Update Logo</div>
                    <div class="card-body">               
                        <input type="file" class="form-control" name="logo">
                        <br>
                        <button class="btn btn-dark" type="submit">Update</button>
                        @if ($errors->has('logo'))
                            <div class="error" style="color:red;">
                                    {{$errors->first('logo')}}
                            </div>
                        @endif
                        
                    </div>
                </div>
            </form>
        </div>
        {{-- END Profile Avatar --}}

        {{-- update Company profile --}}
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Company Information</div>

        <form action="{{route('company.store')}}" method="POST">
                  @csrf 
                        
                    <div class="card-body">
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
                                <button class="btn btn-dark" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
        {{-- end --}}
        </form>

        {{-- Side bar--}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About Your Company</div>
                <div class="card-body">
                
                    {{-- try to solve this error later --}}
                    <p>Company Name: {{Auth::user()->company->cname}}</p>
                    <p>Company Address: {{Auth::user()->company->address}}</p>
                    <p>Company Phone Number: {{Auth::user()->company->phone}}</p>
                    <p>Company Website: {{Auth::user()->company->website}}</p>
                    <p><a href="company/{{Auth::user()->company->slug}}" >View Company Page</a></p>

                </div>
            </div>

            <br>
            <form method="POST" action="{{route('cover.photo')}}" enctype="multipart/form-data">
                  @csrf
            
                <div class="card">
                    <div class="card-header">Update Cover Photo</div>
                    <div class="card-body">                
                        <input type="file" class="form-control" name="cover_photo">                   
                        <br>

                        <button class="btn btn-dark float-end" type="submit">Update</button>

                         @if ($errors->has('cover_photo'))
                            <div class="error" style="color:red;">
                                    {{$errors->first('cover_photo')}}
                            </div>
                        @endif
                        
                    </div>
                </div>
            </form>
            
        </div>
        {{-- End side bar --}}
    </div>
</div>
</div>
@endsection