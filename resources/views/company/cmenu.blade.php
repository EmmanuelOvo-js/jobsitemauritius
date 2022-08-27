<nav class="navbar navbar-expand-lg navbar-dark " style="padding-left:3%;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse cmeny" id="navbarsExample08">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('company.view') }}"><i class="fa fa-building iconcolor"></i>  
             Company Profile <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('job.create')}}"><i class="fa fa-clipboard iconcolor"></i> Post Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('my.jobs') }}"><i class="fa fa-database iconcolor"></i> Posted Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('applicant') }}"><i class="fa fa-users iconcolor"></i> Applicants</a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown08">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> --}}
      </ul>
    </div>
  </nav>