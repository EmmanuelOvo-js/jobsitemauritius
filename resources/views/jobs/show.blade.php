@extends('layouts.main')
@section('content')

{{-- Remove br tags and create a Hero BG for this show page, Also remove the site-navbar-wrap class in nav page --}}

{{-- hero col --}}
<div class="jordan-hero-cover overlay" style="background-image: url('/external/images/jobshow.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9 jobshowhero">
                <p class="badge badge-info"><i class="fa fa-briefcase" aria-hidden="true"></i> {{$job->type}}</p>
                <h3>{{str_limit($job->title,36)}}</h3>
                <ul class="nav">
                    <li>
                        <p><i class="fa fa-money" aria-hidden="true"></i> {{$job->salary}}</p>
                    </li>
                    <li>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> Posted: {{$job->created_at->diffForHumans()}}</p>
                    </li>
                    <li>
                        <p><i class="fa fa-hourglass-half" aria-hidden="true"></i> Closing: {{ date('F d, Y', strtotime($job->last_date)) }}</p>
                    </li>
                </ul>
                <p><i class="fa fa-briefcase iconcolor" aria-hidden="true"></i> {{$job->company->cname}}</p>
                <p><i class="fa fa-map-marker iconcolor" aria-hidden="true"></i> {{$job->address}}</p>
            </div>

            <div class="col-md-2 jobshowbtnleftcol d-flex justify-content-center">
                <div class="applybtns">
                    <div>
                        {{-- Button disappears after logged in user submits form --}}
                        {{-- checkApplication medthod was in job model and also a 'web route' for the form, and a function 'apply' in jobcontroller--}}
                        @if(Auth::check()&&Auth::user()->user_type=='seeker')
                
                        @if(!$job->checkApplication() )
                            <apply-component :jobid={{$job->id}}></apply-component>
                        @else
                        <center><span style="color:white; background:green; padding:3%; border-radius:5px;">You've Applied!</span></center>
                        @endif
                    </div>
                    <div>
                        <favourite-component :jobid={{$job->id}} :favourited={{$job->checkSaved()?'true':'false'}} ></favorite-component>
                        @else
                        <p style="color: rgba(255, 255, 255, 0.632);">
                            Please login as a Seeker to apply for this job
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of hero --}}

<div class="site-section">
    <div class="container">
            {{-- Alert for sendJob email --}}
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif

            @if(Session::has('err_message'))
                <div class="alert alert-danger">{{Session::get('err_message')}}</div>
            @endif


       <div class="row">
            <div class="col-md-8 jobdescription">
                <div class="row desHead">
                    <div class="col-sm-9">
                        <h3><i class="fa fa-file-text" aria-hidden="true"></i> Job Description</h3>
                    </div>
                    <div class="col-sm-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <i class="fa fa-envelope-square sharebtn"> Share Job</i>
                        </a>
                    </div>
                </div>
                <div class="desBody">
                    <i class="fa fa-book iconcolor"> Description</i>
                    <p>{{$job->description}}</p>

                    <i class="fa fa-user iconcolor"> Roles and Responsibilities</i>
                    <p>{{$job->roles}}</p>

                    <i class="fa fa-users iconcolor"> Number of vacancy</i>
                    <p>{{$job->number_of_vacancy}}</p>

                    <i class="fa fa-star iconcolor"> Position</i>
                    <p>{{$job->position}}</p>

                    <i class="fa fa-clock-o iconcolor"> Experience</i>
                    <p>{{$job->experience}} Years</p>

                    <i class="fa fa-dollar iconcolor"> Salary</i>
                    <p>{{$job->salary}}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="aboutCname">
                    <div class="abouthead">
                        <h3>About {{$job->company->cname}}</h3>
                    </div>
                    <div class="aboutbody">
                        <p>{{$job->company->description}}</p>
                    </div>
                    <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" 
                        class="btn btn-primary" id="bodybtn">Company Profile <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
                
            </div>

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

                                <div class="form-goup mb-3 mb-md-0">
                                    <input type="text" name="your_name" class="mr-3 form-control" required="" placeholder="Your Name*">
                                </div>
                                <br>
                                <div class="form-goup mb-3 mb-md-0">
                                    <input type="email" name="your_email" class="mr-3 form-control" required="" placeholder="Your Email*">
                                </div>
                                <br>
                                <div class="form-goup mb-3 mb-md-0">
                                    <input type="text" name="friend_name" class="mr-3 form-control" required="" placeholder="Friends Name*">
                                </div>
                                <br>
                                <div class="form-goup mb-3 mb-md-0">
                                    <input type="email" name="friend_email" class="mr-3 form-control" required="" placeholder="Friends Email*">
                                </div>
                        
                            </div>

                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary" id="bodybtn">Mail this Job</button>
                            </div>

                        </form>
                    </div>
                </div> 
            </div>

            
            <div class="col-md-12">
                <div class="desHead">
                    <h3><i class="fa fa-briefcase"></i> Recommended for You</h3>
                </div>
                <div class="row desBody">
                    @if (count($jobRecommendations)>0)
                    @foreach($jobRecommendations as $jobRecommendation)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                            <p class="card-text badge badge-success">{{$jobRecommendation->type}}</p>
                            <h5 class="card-title">{{$jobRecommendation->position}}</h5>
                                <p class="card-text">{{str_limit($jobRecommendation->description,90)}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('job.show',[$jobRecommendation->id,$jobRecommendation->slug])}}" 
                                        id="bodybtn" class="btn btn-sm btn-primary">Apply Now</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <td><p>No Recommendation Found</p></td>
                    @endif
                </div>                 
            </div>
           
            
            
       </div>

    </div>
</div>
@endsection
