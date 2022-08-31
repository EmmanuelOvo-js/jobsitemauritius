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
                        <h2>Posted Jobs</h2>
                    @include('company.cmenu')
                    </div>
                </div>
                </div>
            </div>

            <div class="row" style="padding:3%;">

               

                <div class="col-md-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    <div class="rounded border jobs-wrap">
                        
                        @if (count($jobs)>0)
                        @foreach ($jobs as $job)
                            <div class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">

                                <div class="company-logo blank-logo text-center text-md-left pl-3">
                                    @if (empty(Auth::user()->company->logo))
                                    <img src="{{asset('avatar/img_avatar.png')}}" alt="Image" class="img-fluid mx-auto">
                                    @else
                                    <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" alt="Image" class="img-fluid mx-auto">
                                    @endif
                                </div>

                                <div class="job-details h-100">
                                    <div class="p-3 align-self-center">
                                        <h3>{{$job->position}}</h3>
                                        <div class="d-block d-lg-flex">
                                            <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->company->cname}}</div>
                                            <div class="mr-3"><span class="icon-room mr-1"></span> {{str_limit($job->address,35)}}</div>
                                            <div>&nbsp;<span class="fa fa-clock-o mr-1"></span>{{$job->created_at->diffForHumans()}} </div>
                                            
                                            <div>&nbsp;<a href="{{route('job.show',[$job->id,$job->slug])}}" 
                                                id="bodybtn" class="btn btn-sm btn-primary">Apply</a>
                                            </div>
                                            <br>
                                            <div>&nbsp;<a href="{{route('job.edit', [$job->id])}}" 
                                                id="edit" class="btn btn-sm btn-primary">Edit</a>
                                            </div>
                                            <br>
                                            <div>&nbsp;<!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-danger" id="delete" data-bs-toggle="modal" 
                                                data-bs-target="#exampleModal6{{$job->id}}">
                                                Delete
                                                </button>
                                            </div>

                                        </div>
                                        
                                    </div>
        
                                    
                                </div>
                            
                            </div>
                             <!-- Modal -->
                            <div class="modal fade" id="exampleModal6{{$job->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: var(--Cinnabar);">
                                            Are you sure you want to delete this job?
                                        </div>
                                        <form action="{{route('myjobs.delete')}}" method="POST">@csrf
                                            <div class="modal-footer">
                                                <input type="hidden" name="id" value="{{$job->id}}">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Yes Please</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        @endforeach
                        @else
                            <td>No jobs found</td>
                        @endif
                    </div>
                    <br>
                    {{ $jobs->links() }}             
                </div>
                
                
                {{-- <div class="card">
                    @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    <div class="card-header j-card-head">Jobs</div>
                    <div class="card-body j-card-body">
                        <table class="table">                      
                            <tbody>
                                @if (count($jobs)>0)
                                @foreach ($jobs as $job)
                                <tr>
                                    <td>
                                        @if (empty(Auth::user()->company->logo))
                                        <img src="{{asset('avatar/img_avatar.png')}}" width="80">
                                        @else
                                            <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" 
                                            alt="" width="80" >
                                        @endif
                                    </td>
                                    <td>Position: {{$job->position}}
                                        <br>
                                        <i class="fa fa-clock-o" aria-hidden="true">&nbsp;{{$job->type}}</i>
                                    </td>
                                    <td><i class="fa fa-map-marker" aria-hidden="true"></i> Address: {{str_limit($job->address,25)}}</td>
                                    <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}} </td>
                                    <td>
    
                                        <a href="{{route('job.show',[$job->id,$job->slug])}}">
                                            <button class="btn btn-success btn-sm">
                                                Apply
                                            </button>
                                        </a>
                                        
                                        <a href="{{route('job.edit', [$job->id])}}" class="btn btn-dark btn-sm">
                                            Edit</a>
    
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                                        data-bs-target="#exampleModal2{{$job->id}}">
                                        Delete
                                        </button>
    
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal2{{$job->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: var(--Cinnabar);">
                                                        Are you sure you want to delete this job?
                                                    </div>
                                                    <form action="{{route('myjobs.delete')}}" method="POST">@csrf
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{$job->id}}">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Yes Please</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
    
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <td>No jobs found</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection