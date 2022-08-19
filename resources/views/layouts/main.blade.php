<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'JobSite') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#EC3D34" />
     <!-- favicon  -->
    <link rel="icon" type="image/png" sizes="32x32"  href="{{asset('/external/images/jobsiteFav.png')}}">
   
    
    @include('../partials.head')
    
</head>
<body>
    <div id="app">
        @include('../partials.nav')
    
        @yield('content')

        @include('../partials.footer')
        
   </div>
</body>
</html>