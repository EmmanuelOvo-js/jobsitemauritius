@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif

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
                                                <div class="modal-body">
                                                    Do you want to delete?
                                                </div>
                                                <form action="{{route('myjobs.delete')}}" method="POST">@csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{$job->id}}">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
    </div>
</div>
@endsection