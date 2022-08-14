@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Search Form --}}
                <form action="{{route('alljobs')}}" method="GET">  

                    <div class="row g-3">
                        <div class="col-sm">
                            <input type="text" name="title" class="form-control" placeholder="Keyword" aria-label="Keyword">
                        </div>
                        <div class="col-sm">
                            <select name="type" id="" class="form-control">
                                <option value="">-Select Employment Type-</option>
                                <option value="fulltime">Fulltime</option>
                                <option value="perttime">Perttime</option>
                                <option value="casual">Casual</option>
                            </select>
                        </div>
                        <div class="col-sm"> 
                            <select name="category" id="" class="form-control">
                                <option value="">-Select Category-</option>
                                @foreach (App\Models\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm">
                            <input type="text" name="address" class="form-control" placeholder="Address" aria-label="Address">
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn btn-outline-success">Search</button>
                        </div>
                    </div>

                </form>
                {{-- End Search Form --}}   
            </div>
    <br>
    <br>
            <h1>Recent Jobs</h1>
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
                        <td><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="80"></td>
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

        <a href="{{route('alljobs')}}"><button class="btn btn-success btn-lg" style="width:30%">Browse All Jobs</button></a>
        
        <br><br><br>
        <h1>Featured Companies</h1>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($companies as $company)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$company->cname}}</h5>
                        <p class="card-text">{{str_limit($company->description,20)}}</p>
                        <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit Company</a>
                    </div>
                </div>
                <br><br>
            </div>
            @endforeach
        </div>
    </div>


@endsection
<style>
    .fa{
        color: #4183D7;
    }
</style>