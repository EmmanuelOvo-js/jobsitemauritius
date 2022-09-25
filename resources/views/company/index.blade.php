@extends('layouts.main')
   
@section('content')

    {{-- hero col --}}
    <div class="jordan-hero-cover overlay" 
        @if(empty($company->cover_photo))
            style="background-image: url('/cover/upload.jpg');"
        @else
            style="background-image: url('{{asset('uploads/cover_photo')}}/{{$company->cover_photo}}');"
        @endif
        >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 cHero">
                    <ul class="nav">
                        <li>
                            @if (empty($company->logo))
                                <img src="{{asset('/avatar/img_avatar.png')}}" alt="company logo" 
                                class="rounded-circle leftavarter" width="140" height="140">
                            @else
                                <img src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="company logo" 
                                class="rounded-circle leftavarter" width="140" height="140">
                            @endif
                        </li>
                        <li style="padding: 0.6rem">
                            <h3>{{$company->cname}}</h3>
                            <p><i class="fa fa-external-link-square" aria-hidden="true"></i> {{$company->website}}</p>
                            <p><i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$company->slogan}}</p>
                            <p class="badge badge-info"><i class="fa fa-map-marker iconcolor" aria-hidden="true"></i> {{$company->address}}</p>
                            <p class="badge badge-info"><i class="fa fa-phone iconcolor" aria-hidden="true"></i> {{$company->phone}}</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="cHeroBack">
                        <a href="{{ url()->previous() }}" class="btn btn-primary" id="bodybtn">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of hero --}} 

    <div class="site-section">
        <div class="container">
            <div class="row">            
                <div class="col-md-8 bg-table">   
                    
                    {{-- <div class="desHead"><h3><i class="fa fa-info-circle"></i> {{$company->cname}} has ({{$company->job->count()}}) Jobs Listed</h3> </div> --}}

                    <table id="CompanyProfileTable" class="table table-responsive">

                            <thead class="d-none">
                                <tr>
                                    <th scope="col">title-1</th>
                                    <th scope="col">title-2</th>
                                    <th scope="col">title-2</th>
                                    <th scope="col">title-2</th>
                                    <th scope="col">title-2</th>

                                </tr>
                            </thead>                     
                            <tbody>
                                @foreach($company->job as $job)
                                <tr class="bghover">
                                    <th>
                                        @if(empty($company->logo))

                                                <img width="100" src="{{asset('avatar/img_avatar.png')}}" alt="avartar" style="width: 3rem">
                                            @else
                                                <img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="avartar" style="width: 3rem">
                                        @endif

                                    </th>

                                    <td>Position:{{str_limit($job->position,5)}}
                                    <br>
                                        <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;{{$job->type}}
                                    </td>

                                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:{{str_limit($job->address,15)}}

                                    <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>

                                    <td>
                                        <a href="{{route('job.show',[$job->id,$job->slug])}}">
                                            <button class="btn btn-success btn-sm outlinebtn"> Apply
                                            </button>
                                        </a>                                     
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                
                <div class="col-md-4">
                    <div class="aboutCname">
                        <div>
                            <h4><i class="fa fa-briefcase"></i> About {{$company->cname}}</h4>
                        </div>
                        <div class="aboutbody">
                            <p>{{$company->description}}</p>
                        </div>                   
                    </div>
                </div> 

            </div>
        </div>
    </div>
    
    
@endsection