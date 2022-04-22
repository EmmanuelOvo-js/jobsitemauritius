@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach ($applicants as $applicant)
                       
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
                                <td>Name: {{$user->name}}</td>
                                <td>Email: {{$user->email}}</td>
                                <td>Address: {{$user->profile->address}}</td>
                                <td>Gender: {{$user->profile->gender}}</td>
                                <td>Bio: {{$user->profile->bio}}</td>
                                <td>Experience: {{$user->profile->experience}}</td>
                                <td><a href="{{Storage::url($user->profile->resume)}}">Resume</a></td>
                                <td><a href="{{Storage::url($user->profile->cover_letter)}}">cover_letter</a></td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                </div>
                
                
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
