@extends('layouts.main')
@section('content')

<div class="site-section">

    <div class="container">
        <div class="row">

            {{-- Search Form --}}
           <div class="col-md-12" style="padding-bottom:5%">
               <form action="" method="GET">  
   
                   <div class="row g-3">
                       
                       <div class="col-sm-8"> 
                        <input type="text" name="name" class="form-control" placeholder="Type in a Category" aria-label="Keyword">
                       </div>
   
                       <div class="col-sm-4">
                           <button type="submit" id="navbtn" class="btn btn-search btn-primary btn-block">Search</button>
                       </div>
                   
                   </div>
   
               </form>
           </div>

           {{-- Category listing --}}
           @if (count($categories)>0)
                @foreach ($categories as $category)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3" id="table_data" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{route('category.index',[$category->id])}}" class="h-100 feature-item">
                        {{-- <span class="d-block icon flaticon-calculator mb-3 text-primary"></span> --}}
                        <h2>{{$category->name}}</h2>
                        <span class="counting">{{$category->jobs->count()}}</span>
                        </a>
                    </div>
                @endforeach
             @else
             <td>No Category found</td>
            @endif
             
       </div>

       {{ $categories->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
    </div>
 

</div>

@endsection