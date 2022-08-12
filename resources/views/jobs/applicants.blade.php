@extends('layouts.main')
@section('content')
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                @foreach ($applicants as $applicant)
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
                                    <td><a href="{{Storage::url($user->profile->resume)}}">Resume</a></td>
                                    <td><a href="{{Storage::url($user->profile->cover_letter)}}">cover_letter</a></td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
