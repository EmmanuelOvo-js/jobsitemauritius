@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Job</div>
                <div class="card-body">

                    <form method="POST" action="{{route('job.update',[$job->id])}}">
                        @csrf
                            @if (Session::has('message'))
                                <div class="alert alert-success">
                                {{Session::get('message')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ $job->title }}">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">
                                {{ $job->description }}
                            </textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         <br>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <input type="text" name="roles" class="form-control @error('roles') is-invalid @enderror" 
                            value="{{ $job->roles}}">

                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <br>
                        <div class="form-group">
                            <label for="category">Category: </label>
                            <select name="category" id="" class="form-control">
                                @foreach (App\Models\Category::all() as $cat)
                                    <option value="{{$cat->id}}" {{$cat->id==$job->category_id?'selected':''}}>
                                        {{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" 
                            value="{{ $job->position }}">

                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control @error('name') is-invalid @enderror" 
                            value="{{ $job->address }}">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="type">Type: </label>
                            <select name="type" id="" class="form-control @error('type') is-invalid @enderror">
                                <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>Fulltime</option>
                                <option value="perttime"{{$job->type=='perttime'?'selected':''}}>Perttime</option>
                                <option value="casual"{{$job->type=='casual'?'selected':''}}>Casual</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select name="status" id="" class="form-control">
                                <option value="1"{{$job->status=='1'?'selected':''}}>Live</option>
                                <option value="0"{{$job->status=='0'?'selected':''}}>Draft</option>  
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="last_date">Last Date</label>
                            <input type="date" name="last_date" class="form-control @error('last_date') is-invalid @enderror"
                            value="{{ $job->last_date }}">

                            @error('last_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-dark">
                                Update
                            </button>
                        </div>
            
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
