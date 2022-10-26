<div class="site-section-jordan-section block-15">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
          <h2>Recent Blog</h2>
        </div>
      </div>

        
        {{-- <div class="nonloop-block-15 owl-carousel">
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="{{route('post.show',[$post->id,$post->slug])}}" class="image-play">
                  <img src="{{asset('storage/'.$post->image)}}" alt="" class="img-fluid img-thumbnail" img-responsive>            
              </div>
              <h2 class="heading mb-0 h5"><a href="{{route('post.show',[$post->id,$post->slug])}}" id="bodylink">{{$post->title}}</a></h2>
              <span class="mb-3 d-block post-date"></a>{{$post->created_at->diffForHumans()}} &bullet; By <a href="" style="color:var(--Tarawera)!important;">Admin</a></span>
              <p style="word-break: break-all;">{{str_limit($post->content,50)}}</p>
              <a href="{{route('post.show',[$post->id,$post->slug])}}" class="btn-sm btn-primary rounded py-3 px-5" id="bodybtn">Read More</a>
            </div>
        </div> --}}
        
      <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
          <div class="card-deck">
            <div class="card">
                <a href="{{route('post.show',[$post->id,$post->slug])}}" class="image-play">
                  <img src="{{asset('storage/'.$post->image)}}" alt="" class="img-fluid img-thumbnail" img-responsive></a>  
                <div class="card-body">
                  <h5 class="card-title"><a href="{{route('post.show',[$post->id,$post->slug])}}" id="bodylink">{{$post->title}}</a></h5>
                  <span class="mb-3 d-block post-date"></a>{{$post->created_at->diffForHumans()}} &bullet; By <a href="" style="color:var(--Tarawera)!important;">Admin</a></span>
                  <p class="card-text"><p style="word-break: break-all;">{{str_limit($post->content,50)}}</p></p>
                </div>
                <a href="{{route('post.show',[$post->id,$post->slug])}}">
                  <div class="card-footer">
                      <small class="text-muted">Last updated: {{date('d-m-Y',strtotime($post->updated_at))}}</small>
                  </div>
                </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      


      
    </div>
</div>