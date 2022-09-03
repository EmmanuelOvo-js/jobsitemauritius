@extends('layouts.main')
@section('content')

    <div class="container-fluid">
        <div class="row">

            @include('company.cLeftcol')

            <div class="col-md-10" style="padding:0px!important;">

                {{-- hero col --}}
                <div class="jordan-hero-cover overlay" style="background-image: url('/external/images/mau.jpg');">
                    <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h2>Applicants</h2>
                        @include('company.cmenu')
                        </div>
                    </div>
                    </div>
                </div>

                <div class="row" style="padding:3%;">
                    <div class="col-md-12">

                        <div class="row">
                            @foreach ($applicants as $applicant)
                            @foreach ($applicant->users as $user)                   
                                <div class="col-md-4 applicantslist" data-aos="zoom-in">
                                        <a href="{{route('job.show',[$applicant->id,$applicant->slug])}}"><h3 class="mb-4">{{str_limit($applicant->title,27)}}</h3></a>
                                        <p style="word-break:break-all;">{{str_limit($user->profile->bio,90)}}</p>
                                        <div class="row mb-3">
                                            <div class="col-sm-6 py-2"><h6>Name: <span class="text-secondary">{{$user->name}}</span></h6></div>
                                            <div class="col-sm-6 py-2"><h6>Birthday: <span class="text-secondary">{{$user->profile->dob}}</span></h6></div>
                                            <div class="col-sm-6 py-2"><h6>Degree: <span class="text-secondary">{{$user->profile->degree}}</span></h6></div>
                                            <div class="col-sm-6 py-2"><h6>Experience: <span class="text-secondary">{{$user->profile->experience}} Years</span></h6></div>
                                            <div class="col-sm-6 py-2"><h6>Phone: <span class="text-secondary">{{$user->profile->phone_number}}</span></h6></div>
                                            <div class="col-sm-6 py-2" style="word-break:break-all;"><h6>Email: <span class="text-secondary">{{$user->email}}</span></h6></div>
                                            <div class="col-sm-6 py-2"><h6>Address: <span class="text-secondary">{{str_limit($user->profile->address,15)}}</span></h6></div>
                                            <div class="col-sm-6 py-2"><h6>Gender: <span class="text-secondary">{{$user->profile->gender}}</span></h6></div>
                                        </div>
                                        <a href="mailto:{{$user->email}}" class="btn btn-sm btn-outline-primary mr-4" id="bodybtn">Hire Me</a>
                                        <a href="{{Storage::url($user->profile->resume)}}" class="btn btn-sm btn-outline-primary" id="outline2" target="_blank">Resume</a>
                                        <a href="{{Storage::url($user->profile->cover_letter)}}" class="btn btn-sm btn-outline-primary" id="outline2" target="_blank">Cover Letter</a>                              
                                </div>
                                &nbsp;
                            @endforeach
                            @endforeach
                        </div> 

                        {{-- @foreach ($applicants as $applicant)
                            <div class="card">
                                <div class="card-header"><a href="{{route('job.show',[$applicant->id,$applicant->slug])}}">{{$applicant->title}}</a></div>
                                <div class="card-body">
                                    @foreach ($applicant->users as $user)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>Name: {{str_limit($user->name,10)}}</td>
                                                <td>Email: {{$user->email}}</td>
                                                <td>Address: {{str_limit($user->profile->address,10)}}</td>
                                                <td>Gender: {{$user->profile->gender}}</td>
                                                <td>Bio: {{str_limit($user->profile->bio,20)}}</td>
                                                <td>Experience: {{str_limit($user->profile->experience,20)}}</td>
                                                <td><a href="{{Storage::url($user->profile->resume)}}" target="_blank">Resume</a></td>
                                                <td><a href="{{Storage::url($user->profile->cover_letter)}}" target="_blank">cover_letter</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                        @endforeach --}}
                        &nbsp;
                        {{ $applicants->links() }} 

                    </div>
                </div>
            </div>
             
        </div>
    </div>
@endsection
