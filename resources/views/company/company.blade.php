@extends('layouts.main')
@section('content')

{{-- hero col --}}
<div class="jordan-hero-cover overlay" style="background-image: url('/external/images/companyimg.jpg');">
  <div class="container">
  <div class="row align-items-center">
      {{-- Search Form --}}
      <div class="col-md-12">
          <form action="{{route('company')}}" method="GET">  

              <div class="row g-3">
                  
                  <div class="col-md-9 mb-3 mb-md-0">
                      <input type="text" name="cname" class="form-control" placeholder="Type in a Company Name" aria-label="Keyword">
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

<div class="site-section bg-light">
   
  <div class="container">

    <div class="row">

      <div class="col-md-12">
        <div class="rounded border jobs-wrap">
            @if (count($companies)>0)
            @foreach ($companies as $company)
                <a href="{{route('company.index',[$company->id,$company->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                    <div class="company-logo blank-logo text-center text-md-left pl-3">
                      @if(empty($company->logo))
                          <img src="{{asset('/avatar/man.jpg')}}" class="img-fluid mx-auto" alt="company image">
                      @else
                          <img src="{{asset('uploads/logo')}}/{{$company->logo}}" class="img-fluid mx-auto" alt="company image">
                      @endif    
                    </div>
                    <div class="job-details h-100">
                        <div class="p-3 align-self-center">
                        <h3>{{$company->cname}}</h3>
                        <div class="d-block d-lg-flex">
                            <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{str_limit($company->description,40)}}</div>
                            <div>&nbsp;<span class="fa fa-clock-o mr-1"></span>{{$company->created_at->diffForHumans()}}</div>
                        </div>
                        </div>
                    </div>
                    <div class="job-category align-self-center">
                                  
                        <div class="p-3">
                            <span class="text-info p-2 rounded border border-info">View Profile</span>
                        </div>
                      
                    </div>  
                </a>
            @endforeach
            @else
            <td><p>No Company Found</p></td>
            @endif

        </div>
        <br>
        {{ $companies->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}  
      </div>

    </div>
  </div>

</div>

@endsection