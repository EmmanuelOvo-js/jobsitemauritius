<div class="site-section-jordan-section" data-aos="fade">
  <div class="container">
  
        <div class="row align-items-center">
              
          <div class="col-md-6 mb-5 mb-md-0">
            
              <div class="img-border">
                @if (empty($testimonial->video_id))
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                @else
                <a href="https://vimeo.com/{{$testimonial->video_id}}" class="popup-vimeo image-play">
                @endif
                
                
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                  <img src="external/images/hero_2.jpg" alt="Image" class="img-fluid rounded">
                </a>
              </div>
            
          </div>
          <div class="col-md-5 ml-auto">
            <div class="text-left mb-5 section-heading">
              <h2>Testimonies</h2>
            </div>
            @if (empty($testimonial->content))
              <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;Lorem ispsum is a dummy text, Lorem ispsum is a dummy text <br> Lorem ispsum is a dummy text,&rdquo;</p>
            @else
              <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;{{$testimonial->content}}&rdquo;</p>
            @endif

            @if (empty($testimonial->name))
            <p>&mdash; <strong class="text-black font-weight-bold">Jordan Creator</strong>,
            @else
            <p>&mdash; <strong class="text-black font-weight-bold">{{$testimonial->name}}</strong>,
            @endif

            @if (empty($testimonial->profession))
              Laravel Developer </p>
            @else
               {{$testimonial->profession}}</p>
            @endif
            
            @if (empty($testimonial->video_id))
            <p><a href="https://vimeo.com/28959265" id="bodylink" class="popup-vimeo text-uppercase">
              Watch Video <span class="icon-arrow-right small"></span></a></p>
            @else
              <p><a href="https://vimeo.com/{{$testimonial->video_id}}" id="bodylink" class="popup-vimeo text-uppercase">
                Watch Video <span class="icon-arrow-right small"></span></a></p>
            @endif
          </div>

        </div>
  
  </div>
</div>