@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          
        <div class="col-md-8">
            
            @if (Session::has('message'))
                <div class="alert alert-success">
                {{Session::get('message')}}
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">{{$job->title}}</div>

                <div class="card-body">
                   <span>
                       <h2>Description</h2>
                       <p>{{$job->description}}</p>
                   </span>

                   <span>
                       <h2>Duties</h2>
                       <p>{{$job->roles}}</p>
                   </span>
                    
                </div>
            </div>
            
        </div>

        <div class="col-md-4">

            <div class="card">
                <div class="card-header">Short Info</div>

                <div class="card-body">
                    <span><h4>Company:</h4><p>
                        <a href="{{ route('company.index', [$job->company->id, $job->company->slug]) }}">
                        {{$job->company->cname}}
                        </a>
                    </p></span>
                    <h4>Address:</h4><p>{{$job->address}}</p>
                    <h4>Position:</h4><p>{{$job->position}}</p>
                    <h4>Employment Type:</h4><p>{{$job->type}}</p>
                    <h4>Posted:</h4><p>{{$job->created_at->diffForHumans()}}</p>
                    <h4>Last Date to Apply:</h4><p>{{ date('F d, Y',strtotime($job->last_date))}}</p>
                </div>
                
            </div>

            {{-- Button disappears after logged in user submits form --}}
            {{-- checkApplication medthod was in job model and also a 'web route' for the form, and a function 'apply' in jobcontroller--}}
            @if (Auth::check()&&Auth::user()->user_type='seeker')
            @if(!$job->checkApplication())
            <br>
            <apply-component jobid={{$job->id}}></apply-component>

            <!-- <form action="{{route('apply',[$job->id])}}" method="POST">
                @csrf
                &nbsp;
                    <button class="btn btn-success" style="width:100%">submit</button>    
            </form> -->

            @endif
            @endif

        </div>
    </div>
</div>
@endsection
