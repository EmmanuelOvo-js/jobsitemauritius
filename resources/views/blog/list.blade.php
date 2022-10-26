@extends('layouts.main')
@section('content')

{{-- hero col --}}
<div class="jordan-hero-cover overlay" style="background-image: url('/external/images/news.jpg');">
  <div class="container">
  <div class="row align-items-center">
      {{-- Search Form --}}
      <div class="col-md-12">
          <form action="{{route('blog')}}" method="GET">  

              <div class="row g-3">
                  
                  <div class="col-md-9 mb-3 mb-md-0">
                      <input type="text" name="title" class="form-control" placeholder="Search for Article" aria-label="Keyword">
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
        @if (count($bloglist)>0)
        @foreach($bloglist as $post)
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
          <br>
        </div>
        @endforeach       
        @else
            No Entry Found
        @endif
        <br>
        
    </div>
    {{ $bloglist->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}  
  </div>

</div>

@endsection