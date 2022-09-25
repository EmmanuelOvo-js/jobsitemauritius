@extends('layouts.main')
@section('content')

{{-- This is the seeker homwpage. Saved jobs displays here --}}

{{-- hero col --}}
<div class="jordan-hero-cover overlay" style="background-image: url('/external/images/seeker_home.jpg');">
    <div class="container">
    <div class="row align-items-center">
        <div>
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe rerum sunt autem consequatur</h1>
        </div>
    </div>
    </div>
  </div>
  {{-- End of hero --}}

<div class="site-section">
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            
            <table class="table table-striped">
                <thead class="d-none">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                </tr>
                </thead>
                <tbody>
                @if (count($jobs)>0)
                @if (Auth::user()->user_type=='seeker')      
                    @foreach($jobs as $job)
                        <tr>
                            <th scope="row">{{str_limit($job->title,30)}}</th>
                            <td>{{$job->position}}</td>
                            <td>{{str_limit($job->description,15)}}</td>
                            <td>Last Date:{{$job->last_date}}</td>
                            <td><a href="{{route('job.show',[$job->id,$job->slug])}}">
                                <button class="btn btn-success btn-sm" id="bodybtn"> Read
                                </button>
                            </a> </td>
                        </tr>
                    @endforeach
                @endif
                @else
                 <td><h3 style="color: var(--Cinnabar);">No Saved Jobs Found!</h3></td>
                @endif 
                </tbody>
            </table>
              
        </div>
    </div>
</div>
</div>
@endsection