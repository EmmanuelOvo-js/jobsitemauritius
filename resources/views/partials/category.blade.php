<div class="site-section-jordan-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
          <h2 class="mb-5">Popular Categories</h2>
        </div>
      </div>
      <div class="row">

        @foreach ($categories as $category)
          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" id="table_data" data-aos="fade-up" data-aos-delay="100">
            <a href="{{route('category.index',[$category->id])}}" class="h-100 feature-item">
              {{-- <span class="d-block icon flaticon-calculator mb-3 text-primary"></span> --}}
              <h2>{{$category->name}}</h2>
              <span class="counting">{{$category->jobs->count()}}</span>
            </a>
          </div>

          {{-- <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="200">
            <a href="#" class="h-100 feature-item">
              <span class="d-block icon flaticon-wrench mb-3 text-primary"></span>
              <h2>Automotive Jobs</h2>
              <span class="counting">192</span>
            </a>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="300">
            <a href="#" class="h-100 feature-item">
              <span class="d-block icon flaticon-worker mb-3 text-primary"></span>
              <h2>Construction / Facilities</h2>
              <span class="counting">1,021</span>
            </a>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="400">
            <a href="#" class="h-100 feature-item">
              <span class="d-block icon flaticon-telecommunications mb-3 text-primary"></span>
              <h2>Telecommunications</h2>
              <span class="counting">1,219</span>
            </a>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="500">
            <a href="#" class="h-100 feature-item">
              <span class="d-block icon flaticon-stethoscope mb-3 text-primary"></span>
              <h2>Healthcare</h2>
              <span class="counting">482</span>
            </a>
          </div>
          
          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="600">
            <a href="#" class="h-100 feature-item">
              <span class="d-block icon flaticon-computer-graphic mb-3 text-primary"></span>
              <h2>Design, Art &amp; Multimedia</h2>
              <span class="counting">5,409</span>
            </a>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="700">
            <a href="#" class="h-100 feature-item">
              <span class="d-block icon flaticon-trolley mb-3 text-primary"></span>
              <h2>Transportation &amp; Logistics</h2>
              <span class="counting">291</span>
            </a>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="800">
            <a href="#" class="h-100 feature-item">
              <span class="d-block icon flaticon-restaurant mb-3 text-primary"></span>
              <h2>Restaurant / Food Service</h2>
              <span class="counting">329</span>
            </a>
          </div> --}}
        @endforeach
   
      
      </div>
      {{-- {{ $categories->links() }} --}}
      {{-- {{ $categories->appends(Illuminate\Support\Facades\Request::except('page'))->links() }} --}}
    </div>
    <div class="col-md-12 text-center mt-5">
      <a href="{{route('all.category')}}" class="btn btn-primary rounded py-3 px-5" id="bodybtn"><span class="icon-plus-circle"></span> Show Categories</a>
    </div>
  </div>