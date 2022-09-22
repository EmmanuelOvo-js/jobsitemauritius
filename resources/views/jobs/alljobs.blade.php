@extends('layouts.main')
@section('content')

{{-- hero col --}}
<div class="jordan-hero-cover overlay" style="background-image: url('/external/images/jobshow.jpg');">
    <div class="container">
    <div class="row align-items-center">
        {{-- Search Form --}}
        <div class="col-md-12">
            <form action="{{route('alljobs')}}" method="GET">  

                <div class="row g-3">
                    
                    <div class="col-md-4 mb-3 mb-md-0">
                        <input type="text" name="position" class="form-control" placeholder="Type in a job position" aria-label="Keyword">
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0">
                        <select name="type" id="" class="form-control">
                            <option value="">-Select Employment Type-</option>
                            <option value="fulltime">Fulltime</option>
                            <option value="parttime">Parttime</option>
                            <option value="casual">Casual</option>
                        </select>
                    </div>
                    {{-- <div class="col-sm"> 
                        <select name="category" id="" class="form-control">
                            <option value="">-Select Category-</option>
                            @foreach (App\Models\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="col-md-3 mb-3 mb-md-0">
                        <input type="text" name="address" class="form-control" placeholder="Address" aria-label="Address">
                    </div>

                    <div class="col-sm">
                        <button type="submit" id="navbtn" class="btn btn-search btn-primary btn-block">Search</button>
                    </div>
                
                </div>

            </form>
        </div>
        {{-- End Search Form --}}  
    </div>
    </div>
</div>
{{-- End of hero --}}

<div class="site-section">
    <div class="container">
        <div class="row">
            
           <div class="col-md-12">
           
                <div class="rounded border jobs-wrap">
                    
                    @if (count($jobs)>0)
                    @foreach ($jobs as $job)
                        <a href="{{route('job.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                            <div class="company-logo blank-logo text-center text-md-left pl-3">
                                @if (empty($company->logo))
                                    <img src="{{asset('external/images/jobsiteFav.png')}}" alt="Image" class="img-fluid mx-auto">
                                @else
                                    <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" alt="Image" class="img-fluid mx-auto">
                                @endif
                            </div>
                            <div class="job-details h-100">
                                <div class="p-3 align-self-center">
                                <h3>{{$job->position}}</h3>
                                <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->company->cname}}</div>
                                    <div class="mr-3"><span class="icon-room mr-1"></span> {{str_limit($job->address,30)}}</div>
                                    <div><span class="icon-money mr-1"></span>{{$job->salary}}</div>
                                    <div>&nbsp;<span class="fa fa-clock-o mr-1"></span>{{$job->created_at->diffForHumans()}} </div>
                                </div>
                                </div>
                            </div>
                            <div class="job-category align-self-center">
                                @if ($job->type=='fulltime')                   
                                <div class="p-3">
                                    <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                                </div>
                                @elseif($job->type=='partime')
                                <div class="p-3">
                                    <span class="text-danger p-2 rounded border border-danger">{{$job->type}}</span>
                                </div>
                                @else
                                <div class="p-3">
                                    <span class="text-warning p-2 rounded border border-warning">{{$job->type}}</span>
                                </div>
                                @endif
                            </div>  
                        </a>
                    @endforeach
                    @else
                        <td>No jobs found</td>
                    @endif

                </div>
            </div>

           {{-- {‌{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links()}} --}}
           {{ $jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
           
        </div>
        
    </div>
</div>

@endsection
{{-- <style>
    .fa{
        color: #4183D7;
    }
</style> --}}