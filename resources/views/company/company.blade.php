@extends('layouts.main')
@section('content')

<div class="site-section">
    <div class="container">
        <h2>Companies</h2>
        <div class="row">
            @foreach($companies as $company)
                <div class="col-md-3">

                    <div class="card" style="width: 18rem;">
                        @if(empty($company->logo))
                            <img src="{{asset('avatar/man.jpg')}}" class="card-img-top" alt="...">
                        @else
                            <img src="{{asset('avatar/man.jpg')}}" class="card-img-top" alt="...">
                        @endif

                        <div class="card-body">
                        <h5 class="card-title">{{$company->cname}}</h5>
                        <p class="card-text">{{str_limit($company->description,40)}}</p>
                        <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">View Company</a>
                        </div>
                    </div>
                    <br>
                </div>
                
            @endforeach
        </div>
        <br>
        {{$companies->links()}}
    </div>
</div>
@endsection