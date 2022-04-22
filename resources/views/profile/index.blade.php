@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Profile Avatar --}}
        <div class="col-md-3">
            {{-- If user has not uploaded a profile img display default avatar else display uploaded image --}}
            @if (empty(Auth::user()->profile->avatar))
                <img src="{{asset('avatar/serwman1.jpg')}}" alt="" width="100" style="width: 100%;">
            @else
                 <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" alt="" width="100" style="width: 100%;">
            @endif
           
            <form method="POST" action="{{route('avatar')}}" enctype="multipart/form-data">
                  @csrf
                <br>
                <div class="card">
                    <div class="card-header">Update Profile Picture</div>
                    <div class="card-body">               
                        <input type="file" class="form-control" name="avatar">
                        <br>
                        <button class="btn btn-success" type="submit">Update</button>
                        @if ($errors->has('avatar'))
                            <div class="error" style="color:red;">
                                    {{$errors->first('avatar')}}
                            </div>
                        @endif
                        
                    </div>
                </div>
            </form>
        </div>
        {{-- END Profile Avatar --}}

        {{-- update profile --}}
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Profile</div>

        <form method="POST" action="{{route('profile.create')}}" enctype="multipart/form-data">
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
                                value="{{Auth::user()->profile->address}}">

                                @if ($errors->has('address'))
                                    <div class="error" style="color:red;">
                                        {{$errors->first('address')}}
                                    </div>
                                @endif
                                
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number" 
                                value="{{Auth::user()->profile->phone_number}}">
                                @if ($errors->has('phone_number'))
                                    <div class="error" style="color:red;">
                                        {{$errors->first('phone_number')}}
                                    </div>
                                @endif
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <textarea name="experience" id="" cols="30" rows="10" class="form-control">
                                    {{Auth::user()->profile->experience}}</textarea>
                                @if ($errors->has('experience'))
                                    <div class="error" style="color:red;">
                                        {{$errors->first('experience')}}
                                    </div>
                                @endif
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea name="bio" id="" cols="30" rows="10" class="form-control">
                                    {{Auth::user()->profile->bio}}</textarea>
                                    @if ($errors->has('bio'))
                                        <div class="error" style="color:red;">
                                            {{$errors->first('bio')}}
                                        </div>
                                    @endif
                            </div>
                            &nbsp;

                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
        {{-- end --}}
        </form>

        {{-- Side bar--}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About You</div>
                <div class="card-body">
                    <p>Name: {{Auth::user()->name}}</p>
                    <p>Email: {{Auth::user()->email}}</p>
                    <p>Address: {{Auth::user()->profile->address}}</p>
                    <p>Phone Number: {{Auth::user()->profile->phone_number}}</p>
                    <p>Gender: {{Auth::user()->profile->gender}}</p>
                    <p>Experience: {{Auth::user()->profile->experience}}</p>
                    <p>Bio: {{Auth::user()->profile->bio}}</p>
                    <p>Member On: {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>

                    {{-- To download cover letter from profile tables in database --}}
                    @if (!empty(Auth::user()->profile->cover_letter))
                        <p><a download="cover_letter" href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover Letter</a></p>
                    @else
                        <p>Please uplaod cover letter</p>
                    @endif
                    {{-- To download resume from profile tables in database --}}
                    @if (!empty(Auth::user()->profile->resume))
                        <p><a download="resume" href="{{Storage::url(Auth::user()->profile->resume)}}">Resume</a></p>
                    @else
                        <p>Please uplaod Resume</p>
                    @endif

                </div>
            </div>
            <br>
            <form method="POST" action="{{route('cover.letter')}}" enctype="multipart/form-data">
                  @csrf
            
                <div class="card">
                    <div class="card-header">Update Cover Letter</div>
                    <div class="card-body">                
                        <input type="file" class="form-control" name="cover_letter">                   
                        <br>
                        <button class="btn btn-success float-end" type="submit">Update</button>
                         @if ($errors->has('cover_letter'))
                            <div class="error" style="color:red;">
                                    {{$errors->first('cover_letter')}}
                            </div>
                        @endif
                        
                    </div>
                </div>
            </form>

            <form method="POST" action="{{route('resume')}}" enctype="multipart/form-data">
                  @csrf
                <br>
                <div class="card">
                    <div class="card-header">Update Resume</div>
                    <div class="card-body">               
                        <input type="file" class="form-control" name="resume">
                        <br>
                        <button class="btn btn-success float-end" type="submit">Update</button>
                         @if ($errors->has('resume'))
                            <div class="error" style="color:red;">
                                    {{$errors->first('resume')}}
                            </div>
                        @endif
                        
                    </div>
                </div>
            </form>
            
        </div>
        {{-- End side bar --}}
    </div>
</div>
@endsection
