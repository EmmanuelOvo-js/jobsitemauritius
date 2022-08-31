@extends('layouts.main')
@section('content')

        <div class="container-fluid">
            <div class="row justify-content-center">

                @include('company.cLeftcol')

                <div class="col-md-10" style="padding:0px!important;">
                    {{-- hero col --}}
                    <div class="jordan-hero-cover overlay" style="background-image: url('/external/images/mau.jpg');" >
                        <div class="container">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h2>Post a Job</h2>
                            @include('company.cmenu')
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col" data-aos="zoom-in" style="padding:3%;">
                        <div class="card">
                            <div class="card-header j-card-head">Create a Job</div>
                            <div class="card-body j-card-body">
    
                                <form method="POST" action="{{route('job.store')}}">
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
                                                value="{{ old('title') }}">
            
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        
                                            
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">
                                                    {{ old('description') }}
                                                </textarea>
            
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="roles">Roles</label>
                                                <textarea name="roles" class="form-control @error('roles') is-invalid @enderror" cols="30" rows="10">
                                                    {{ old('roles') }}</textarea>
                                                    
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
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
    
                                        </div>
                                        {{-- End first col --}}

                                        {{-- Second col --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="position">Position</label>
                                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" 
                                                value="{{ old('position') }}">
            
                                                @error('position')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" class="form-control @error('name') is-invalid @enderror" 
                                                value="{{ old('address') }}">
            
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
            
                                            
            
                                            <div class="form-group">
                                                <label for="number_of_vacancy">No of Vacancy:</label>
                                                <input type="text" name="number_of_vacancy" class="form-control @error('number_of_vacancy') is-invalid @enderror"  
                                                value="{{ old('number_of_vacancy') }}">
            
                                                @if ($errors->has('number_of_vacancy'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            
            
                                            <div class="form-group">
                                                <label for="experience">Years of Experience:</label>
                                                <input type="text" name="experience" class="form-control @error('experience') is-invalid @enderror"  
                                                value="{{ old('experience') }}">
            
                                                @if ($errors->has('experience'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('experience') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
            
                                            
            
                                            {{-- <div class="form-group">
                                                <label for="type">Gender:</label>
                                                <select class="form-control" name="gender">
                                                    <option value="others">Others</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                             --}}
            
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
                                                    <option value="fulltime">Fulltime</option>
                                                    <option value="perttime">Perttime</option>
                                                    <option value="casual">Casual</option>
                                                </select>
                                            </div>
                                            
            
                                            <div class="form-group">
                                                <label for="status">Status: </label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="1">Live</option>
                                                    <option value="0">Draft</option>  
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="last_date">Last Date</label>
                                                <input type="date" name="last_date" class="form-control @error('last_date') is-invalid @enderror"
                                                value="{{ old('last_date') }}">
            
                                                @error('last_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <button class="btn btn-dark" id="bodybtn">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                        {{-- End Second col --}}
                                    </div>
                               

                                </form>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
   
@endsection
