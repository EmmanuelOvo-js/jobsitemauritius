<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'JobSite') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#EC3D34" />
     <!-- favicon  -->
    <link rel="icon" type="image/png" sizes="32x32"  href="{{asset('/external/images/jobsiteFav.png')}}">
   
    
    @include('../partials.head')
    @include('../partials.nav')
    
</head>
<body>

    @include('partials.hero')
    

    @include('partials.category')


    <div class="site-section-jordan-section bg-light">
      <div class="container">
        <div class="row">

          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h1 class="mb-5 h1">Recent Jobs</h1>
            <div class="rounded border jobs-wrap">

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
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{str_limit($job->address,37)}}a</div>
                      <div><span class="icon-money mr-1"></span>{{$job->salary}}</div>
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

            </div>

            <div class="col-md-12 text-center mt-5">
              <a href="{{route('alljobs')}}" class="btn btn-primary rounded py-3 px-5" id="bodybtn"><span class="icon-plus-circle"></span> Show More Jobs</a>
            </div>
          </div>
          {{-- <div class="col-md-4 block-16" data-aos="fade-up" data-aos-delay="200">
            <div class="d-flex mb-0">
              <h2 class="mb-5 h3 mb-0">Featured Jobs</h2>
              <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
            </div>

            <div class="nonloop-block-16 owl-carousel">

              <div class="border rounded p-4 bg-white">
                <h2 class="h5">Restaurant Crew</h2>
                <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                <p>
                  <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                  <span class="d-block"><span class="icon-room"></span> Florida</span>
                  <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                </p>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi neque fugit tempora, numquam voluptate veritatis odit id, iste eum culpa alias, ut officiis omnis itaque ad, rem sunt doloremque molestias.</p>
              </div>

              <div class="border rounded p-4 bg-white">
                <h2 class="h5">Javascript Fullstack Developer</h2>
                <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                <p>
                  <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                  <span class="d-block"><span class="icon-room"></span> Florida</span>
                  <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                </p>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus accusamus necessitatibus praesentium voluptate natus excepturi rerum, autem. Magnam laboriosam, quam sapiente laudantium iure sit ea! Tenetur, quasi, praesentium. Architecto, eum.</p>
              </div>

              <div class="border rounded p-4 bg-white">
                <h2 class="h5">Assistant Brooker, Real Estate</h2>
                <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                <p>
                  <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                  <span class="d-block"><span class="icon-room"></span> Florida</span>
                  <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                </p>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus esse, quam consectetur ipsum quibusdam ullam ab nesciunt, doloribus voluptatum neque iure perspiciatis vel vero illo consequatur facilis, fuga nobis corporis.</p>
              </div>

              <div class="border rounded p-4 bg-white">
                <h2 class="h5">Telecommunication Manager</h2>
                <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                <p>
                  <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                  <span class="d-block"><span class="icon-room"></span> Florida</span>
                  <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                </p>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at ipsum commodi hic, cum esse asperiores libero molestiae, perferendis consectetur assumenda iusto, dolorem nemo maiores magnam illo laborum sit, dicta.</p>
              </div>

            </div>

          </div> --}}
        </div>
      </div>
    </div>

    @include('partials.testimonial')

      <div class="site-blocks-cover overlay inner-page" style="background-image: url('external/images/hero_1.jpg');" 
        data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 text-center" data-aos="fade">
              <h1 class="h3 mb-0">Your Dream Job</h1>
              <p class="h3 text-white mb-5">Is Waiting For You</p>

              <p><a href="{{route('register')}}" id="bodybtnoutline" class="btn btn-outline-warning py-3 px-4">Job Seeker</a> 
                <a href="{{route('employerRegister')}}" id="bodybtn" class="btn btn-warning py-3 px-4">Employer</a>
              </p>             
            </div>
          </div>
        </div>
      </div>

    <div class="site-section-jordan-section site-block-feature bg-light">
      <div class="container">
        
        <div class="text-center mb-5 section-heading">
          <h2>Why Choose Jobsite</h2>
        </div>

        <div class="d-block d-md-flex border-bottom">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="flaticon-worker display-3 mb-3 d-block text-primary" style="color:var(--Tarawera)!important;"></span>
            <h2 class="h4">More Jobs Every Day</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a id="bodylink" href="#">Read More <span class="icon-arrow-right small" style="color:var(--Cinnabar);"></span></a></p>
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-wrench display-3 mb-3 d-block text-primary" style="color:var(--Tarawera)!important;"></span>
            <h2 class="h4">Creative Jobs</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a id="bodylink" href="#">Read More <span class="icon-arrow-right small" style="color:var(--Cinnabar);"></span></a></p>
          </div>
        </div>
        <div class="d-block d-md-flex">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary" style="color:var(--Tarawera)!important;"></span>
            <h2 class="h4">Healthcare</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a id="bodylink" href="#">Read More <span class="icon-arrow-right small" style="color:var(--Cinnabar);"></span></a></p>
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-calculator display-3 mb-3 d-block text-primary" style="color:var(--Tarawera)!important;"></span>
            <h2 class="h4">Finance &amp; Accounting</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a id="bodylink" href="#">Read More <span class="icon-arrow-right small" style="color:var(--Cinnabar);"></span></a></p>
          </div>
        </div>
      </div>
    </div>
    
    @include('partials.blog')
    
    @include('partials.footer')
    
  <style>
    .fas{
      color: var(--Cinnabar);
    }
  </style>

</body>
</html>