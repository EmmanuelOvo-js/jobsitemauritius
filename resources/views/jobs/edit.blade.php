@extends('layouts.main')
@section('content')


    <div class="container-fluid">
        <div class="row">
            @include('company.cLeftcol')

            <div class="col-md-10" style="padding:0px!important;">


                {{-- hero col --}}
                <div class="jordan-hero-cover overlay" style="background-image: url('/external/images/mau.jpg');">
                    <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h2>Update Job</h2>
                        @include('company.cmenu')
                        </div>
                    </div>
                    </div>
                </div>

                <div class="row" style="padding:3%;">
                    <div class="col-md-12">
                        <div class="card" data-aos="zoom-in">
                            <div class="card-header j-card-head">Update Job</div>
                            <div class="card-body j-card-body">
        
                                <form method="POST" action="{{route('job.update',[$job->id])}}">
                                    @csrf
                                        @if (Session::has('message'))
                                            <div class="alert alert-success">
                                            {{Session::get('message')}}
                                            </div>
                                        @endif

                                    <div class="row">
                                        {{-- first col --}}
                                        <div class="col-md-6">
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
                                        
                                            <div class="form-group">
                                                <label for="category">Category: </label>
                                                <select name="category" id="" class="form-control">
                                                    @foreach (App\Models\Category::all() as $cat)
                                                        <option value="{{$cat->id}}" {{$cat->id==$job->category_id?'selected':''}}>
                                                            {{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        
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
                
                                        </div>
                                        {{-- End of first col --}}

                                        {{-- Second Col --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="number_of_vacancy">No of Vacancy:</label>
                                                <input type="text" name="number_of_vacancy" class="form-control @error('number_of_vacancy') is-invalid @enderror"  
                                                value="{{ $job->number_of_vacancy}}">
                
                                                @if ($errors->has('number_of_vacancy'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
        
                                            <div class="form-group">
                                                <label for="experience">Years of Experience:</label>
                                                <input type="text" name="experience" class="form-control @error('experience') is-invalid @enderror"  
                                                value="{{ $job->experience}}">
                
                                                @if ($errors->has('experience'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('experience') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
        
                                            <div class="form-group">
                                                <label for="type">Gender:</label>
                                                <select class="form-control" name="gender">
                                                    <option value="fulltime"{{$job->gender=='others'?'selected':''}}>Others</option>
                                                    <option value="partime"{{$job->gender=='male'?'selected':''}}>Male</option>
                                                    <option value="casual"{{$job->gender=='female'?'selected':''}}>Female</option>
                                                </select>
                                            </div>
        
                                            <div class="form-group">
                                                <label for="type">Salary/year:</label>
                                                <select class="form-control" name="salary">
                                                    <option value="negotiable">Negotiable</option>
                                                    <option value="2000-5000">2000-5000</option>
                                                    <option value="50000-10000">5000-10000</option>
                                                    <option value="10000-20000">10,000-20,000</option>
                                                    <option value="30000-500000">50,000-50,0000</option>
                                                    <option value="500000-600000">50,0000-60,0000</option>
                                                    <option value="600000 plus">60,0000 and Above</option>
                                                </select>
                                            </div>
        
                                            <div class="form-group">
                                                <label for="type">Type: </label>
                                                <select name="type" id="" class="form-control @error('type') is-invalid @enderror">
                                                    <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>Fulltime</option>
                                                    <option value="perttime"{{$job->type=='perttime'?'selected':''}}>Perttime</option>
                                                    <option value="casual"{{$job->type=='casual'?'selected':''}}>Casual</option>
                                                </select>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="status">Status: </label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="1"{{$job->status=='1'?'selected':''}}>Live</option>
                                                    <option value="0"{{$job->status=='0'?'selected':''}}>Draft</option>  
                                                </select>
                                            </div>
                                        
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
                                        
                                            <div class="form-group">
                                                <button class="btn btn-dark" id="bodybtn">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                        {{-- End Second Col --}}
                                    </div>    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </div>

@endsection
