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
                                  <th scope="col">Image</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Content</th>
                                  <th scope="col">Satus</th>
                                  <th>Date</th>
                                  <th scope="col">Action</th>

                            </tr>
                          </thead>
                          <tbody>
                            @if (count($posts)>0)
                              @foreach($posts as $post)
                                <tr>
                                  <td><img src="{{asset('storage/'.$post->image)}}" width="50"></td>
                                  <td>{{$post->title}}</td>
                                  <td>{{str_limit($post->content,20)}}</td>
                                  <td>
                                    @if($post->status=='0')
                                      <a href="" class="badge badge-primary"> Draft</a>
                                        @else
                                        <a href="" class="badge badge-success">  Live</a>
                                    @endif
                                  </td>
                                  <td>{{$post->created_at->diffForHumans()}}</td>
                                  <td>
                                    <a href="{{route('post.restore',[$post->id])}}"><button class="btn btn-success">Restore</button></a>
                                  </td>

                                  {{-- <td>
                                    <a href="{{route('post.edit',[$post->id])}}"><button class="btn btn-primary">Edit</button></a>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                                    data-bs-target="#delete{{$post->id}}">
                                    Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to permanently delete this item?
                                                </div>
                                                <form action="{{route('post.Permanentlydelete')}}" method="POST">@csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{$post->id}}">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Permanently delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>




                                </td> --}}
                                </tr>
                              @endforeach
                              @else
                                  <td class="text-center">No Item Found</td>
                              @endif
                            
                          </tbody>
                        </table>
                          {{$posts->links()}}

                    </div>
                  </div>
              </div>
            </div>
        </div>
</div>
<br>
<br>
<br>
@endsection