@extends('layouts.main')
@section('content')

{{-- Remove br tags and create a Hero BG for this show page, Also remove the site-navbar-wrap class in nav page --}}
<br>
<br> 
<br>
<br>
    <div class="container">
            {{-- Alert for sendJob email --}}
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif

            @if(Session::has('err_message'))
                <div class="alert alert-danger">{{Session::get('err_message')}}</div>
            @endif

            {{-- @if(isset($errors)&&count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="row">
                <div class="title" style="margin-top: 20px;">
                    <h2>{{$job->title}}</h2> 
                </div>

                <img src="{{asset('cover/hero-job-image.jpg')}}" style="width: 100%;">

                <div class="col-lg-8">
                    
                    <div class="p-4 mb-8 bg-white">
                        <!-- icon-book mr-3-->
                        <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;
                        </i>Description <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        <i class="fa fa-envelope-square" style="font-size: 34px; float:right; color:green;"></i></a></h3>
                        <p> {{$job->description}}</p>
                    </div>

                    <div class="p-4 mb-8 bg-white">
                        <!--icon-align-left mr-3-->
                        <h3 class="h5 text-black mb-3"><i class="fa fa-user" style="color: blue;">&nbsp;</i>Roles and Responsibilities</h3>
                        <p>{{$job->roles}}</p>
                    </div>

                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-users" style="color: blue;">&nbsp;</i>Number of vacancy</h3>
                        <p>{{$job->number_of_vacancy }}</p>
                    </div>

                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-clock-o" style="color: blue;">&nbsp;</i>Experience</h3>
                        <p>{{$job->experience}}&nbsp;Years</p>
                    </div>

                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-venus-mars" style="color: blue;">&nbsp;</i>Gender</h3>
                        <p>{{$job->gender}} </p>
                    </div>

                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-dollar" style="color: blue;">&nbsp;</i>Salary</h3>
                        <p>{{$job->salary}}</p>
                    </div>

                </div>

            
                <div class="col-md-4 p-4 site-section bg-light">
                    <h3 class="h5 text-black mb-3 text-center">Short Info</h3>
                    <p>Company Name: {{$job->company->cname}}</p>
                    <p>Address: {{$job->address}}</p>
                    <p>Employment Type: {{$job->type}}</p>
                    <p>Position: {{$job->position}}</p>
                    <p>Posted: {{$job->created_at->diffForHumans()}}</p>
                    <p>Last date to apply: {{ date('F d, Y', strtotime($job->last_date)) }}</p>

                    <p><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" 
                        class="btn btn-warning" style="width: 100%;">Visit Company Page</a></p>

                    <p>

                        {{-- Button disappears after logged in user submits form --}}
                        {{-- checkApplication medthod was in job model and also a 'web route' for the form, and a function 'apply' in jobcontroller--}}
                        @if(Auth::check()&&Auth::user()->user_type=='seeker')
                
                        @if(!$job->checkApplication() )
                            <apply-component :jobid={{$job->id}}></apply-component>
                        @else
                        <center><span style="color: #000;">You applied this job</span></center>
                        @endif

                        <br>

                        <favourite-component :jobid={{$job->id}} :favourited={{$job->checkSaved()?'true':'false'}}  ></favorite-component>
                        @else
                            Please login as a Seeker to apply for this job

                        @endif

                    </p>

                </div>

                @foreach($jobRecommendations as $jobRecommendation)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="badge badge-success">{{$jobRecommendation->type}}</p>
                            <h5 class="card-title">{{$jobRecommendation->position}}</h5>
                            <p class="card-text">{{str_limit($jobRecommendation->description,90)}}</p>
                               
                            <a href="{{route('job.show',[$jobRecommendation->id,$jobRecommendation->slug])}}" 
                                class="btn btn-success">Apply</a>

                        </div>
                    </div>
                @endforeach

                <!-- Modal -->
     <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send job to your friend</h5>
                    <button type="button" class="icon-close2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('mail')}}" method="POST">@csrf
                    <div class="modal-body">
                        {{-- Hidden input to get job_id and job_slug --}}
                        <input type="hidden" name="job_id" value="{{$job->id}}">
                        <input type="hidden" name="job_slug" value="{{$job->slug}}">
                        {{-- End hidden input --}}

                        <div class="form-goup">
                            <label>Your name * </label>
                            <input type="text" name="your_name" class="form-control" required="">
                        </div>
                        <br>
                        <div class="form-goup">
                            <label>Your email *</label>
                            <input type="email" name="your_email" class="form-control" required="">
                        </div>
                        <br>
                        <div class="form-goup">
                            <label>Person name *</label>
                            <input type="text" name="friend_name" class="form-control" required="">
                        </div>
                        <br>
                        <div class="form-goup">
                            <label>Person email *</label>
                            <input type="email" name="friend_email" class="form-control" required="">
                        </div>
                
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Mail this Job</button>
                    </div>

                </form>
            </div>
        </div>
        
      </div>


            </div>
            <br>
            <br> 
            

    </div>
   
@endsection
