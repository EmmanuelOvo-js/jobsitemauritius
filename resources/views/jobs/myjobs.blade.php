@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Jobs</div>
                    <table class="table">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
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
                                <td><i class="fa fa-map-marker" aria-hidden="true"></i> Address: {{$job->address}}</td>
                                <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}} </td>
                                <td>

                                    <a href="{{route('job.show',[$job->id,$job->slug])}}">
                                        <button class="btn btn-success btn-sm">
                                            Apply
                                        </button>
                                    </a>
                                    
                                    <a href="{{route('job.edit', [$job->id])}}" class="btn btn-dark btn-sm">
                                        Edit</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
    </div>
</div>
@endsection