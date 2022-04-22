@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
       <div class="company-profiles">
           {{-- if cover photo is empty, Show placeholder, esle, show uploaded auth user cover_photo --}}
           @if (empty($company->cover_photo))
            <img src="{{asset('cover/tumblr-image-sizes-banner.png')}}" alt="" style="width: 100%">
          
             @else
                <img src="{{asset('uploads/cover_photo')}}/{{$company->cover_photo}}" alt="" style="width: 100%;" height="">
           @endif
        
            <div class="company-desc">
                <br>
                @if (empty($company->logo))
                    <img src="{{asset('avatar/serwman1.jpg')}}" alt="" width="100" >
                 @else
                    <img src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="" width="100">
                @endif
                <p>{{$company->description}}</p>
                <h2>{{$company->cname}}</h2>
                <p>Slogan-{{$company->slogan}} |
                Address-{{$company->address}} |
                Phone-{{$company->phone}} |
                Website-{{$company->website}}</p>
            </div>
       </div>

        <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company->job as $job)
                    <tr>
                        <td><img src="{{asset('avatar/img_avatar.png')}}" width="80"></td>
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
                            
                        </td>
                    </tr>
                     @endforeach
                </tbody>

            </table>
    </div>
</div>
@endsection

