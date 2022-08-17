@extends('layouts.main')
@section('content')

<div class="site-section">
    <div class="container">
        @if(Session::has('message'))
          <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="row">

          <div class="col-md-10">
            <h1>All Jobs</h1>
          </div>
          <div class="col-md-2">
            <a href="{{_('/dashboard')}}"><button class="btn btn-primary float-right" id="bodybtn">Back</button></a> 
          </div>

          <div class="col">
            <div class="card">
              <div class="card-header">
                  All jobs
              </div>           
              <div class="card-body">

                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Created Date</th>
                          <th scope="col">Position</th>
                          <th>Company</th>
                          <th scope="col">Status</th>
                          <th scope="col">View</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($jobs as $job)
                          <tr>
                            <th scope="row">{{date('Y-m-d',strtotime($job->created_at))}}</th>
                            <td>{{$job->position}}</td>
                            <td>{{$job->company->cname}}</td>
                            <td>
                                @if($job->status=='0')
                                    <a href="{{route('job.status',[$job->id])}}" class="badge badge-primary"> Draft</a>
                                      @else
                                    <a href="{{route('job.status',[$job->id])}}" class="badge badge-success"> Live</a>
                                @endif
                            </td>
                            <td><a href="{{route('job.show',[$job->id,$job->slug])}}" target="_blank">Read</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                    {{$jobs->links()}}
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection
