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
                        {{-- <th scope="col">Content</th> --}}
                        <th scope="col">Name</th>
                        <th scope="col">Profession</th>
                        <th scope="col">Viemo video id</th>                 
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($testimonials as $testimonial)
                      
                        <tr>
                          {{-- <td>{{str_limit($testimonial->content,25)}}</td>                     --}}
                          <td>{{$testimonial->name}}</td>
                          <td>{{$testimonial->profession}}</td>
                          <td>{{$testimonial->video_id}}</td>
                          <td><a href="{{route('testimonial.edit',[$testimonial->id])}}"><button class="btn btn-primary btn-sm">Edit</button></a></td>
                          <td>
                             
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                            data-bs-target="#exampleModalT{{$testimonial->id}}">
                            Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalT{{$testimonial->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete?
                                        </div>
                                        <form action="{{route('testimonial.delete')}}" method="POST">@csrf
                                            <div class="modal-footer">
                                                <input type="hidden" name="id" value="{{$testimonial->id}}">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </td>
                          
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