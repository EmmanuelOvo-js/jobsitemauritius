@extends('layouts.main')
@section('content')

<div class="site-blocks-cover overlay" style="background-image: url('external/images/company.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12" data-aos="fade">
          <h1>Lorem Ipsum Help You Dollar sign <br> Jordan Lorem Ipsum</h1>
        </div>
      </div>
    </div>
</div>

<div class="site-section bg-light">
   
        <div class="container">
          <div class="row">
            @foreach($companies as $company)
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  @if(empty($company->logo))
                      <img src="{{asset('avatar/man.jpg')}}" class="card-img-top" alt="company image">
                  @else
                      <img src="{{asset('avatar/man.jpg')}}" class="card-img-top" alt="company image">
                  @endif
          
                  <div class="card-body">
                  <h5 class="card-title">{{$company->cname}}</h5>
                    <p class="card-text">{{str_limit($company->description,40)}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                          <a href="{{route('company.index',[$company->id,$company->slug])}}" id="bodybtn" class="btn btn-sm btn-primary">View Company Profile</a>
                      </div>
                      <small class="text-muted">{{$company->created_at->diffForHumans()}}</small>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
            {{$companies->links()}}
        </div>
        
    
</div>

@endsection