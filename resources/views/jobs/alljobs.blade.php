@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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

           {{-- {‌{$jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links()}} --}}
           {{ $jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
        </div>

    </div>

    
@endsection
<style>
    .fa{
        color: #4183D7;
    }
</style>