@extends('layouts.main')
@section('content')
  <div class="site-section">
    <div class="container">
        @if(Session::has('message'))
          <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif

        <div class="row">
          <div class="col-md-3">
            @include('admin.left-menu')
          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Content</th>
                        <th scope="col">Name</th>
                        <th scope="col">Profession</th>
                        <th scope="col">Viemo video id</th>                 
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($testimonials as $testimonial)
                        <tr>
                          <td>{{str_limit($testimonial->content,25)}}</td>                    
                          <td>{{$testimonial->name}}</td>
                          <td>{{$testimonial->profession}}</td>
                          <td>{{$testimonial->video_id}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                   {{$testimonials->links()}}

              </div>
            </div>
          </div>
      </div>
    </div>
  </div>


@endsection