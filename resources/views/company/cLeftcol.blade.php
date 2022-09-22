

{{-- Side About Company--}}
    <div class="col-md-2" id="left-col">

        <div class="avater text-center cleftdiv1">

            @if (empty(Auth::user()->company->logo))
                <img src="{{asset('avatar/serwman1.jpg')}}"
                class="rounded-circle leftavarter" alt="company logo" width="140" height="140">
             @else
                <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}"
                class="rounded-circle leftavarter" 
                alt="company logo"width="140" height="140">
            @endif
            <h4> <i class="fa fa-user iconcolor"></i> {{Auth::user()->company->cname}}</h4>
            
        </div>
        

            <div class="cleftdiv2">
                <h4>Company Info</h4>
                {{-- try to solve this error later --}}
                <p><i class="fa fa-building iconcolor" ></i> {{Auth::user()->company->cname}}</p>
                <p><i class="fa fa-map-marker iconcolor" ></i> {{Auth::user()->company->address}}</p>
                <p><i class="fa fa-volume-control-phone iconcolor" ></i> {{Auth::user()->company->phone}}</p>
                <p><i class="fa fa-globe iconcolor" ></i> {{Auth::user()->company->website}}</p>
                <p><a id="bodylink2" href="company/{{Auth::user()->company->slug}}">
                    <i class="fa fa-link iconcolor" ></i> View Company Page
                    </a>
                </p>
            </div>
          
    </div>
{{-- End side bar --}}