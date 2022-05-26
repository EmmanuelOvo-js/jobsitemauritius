<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'JobSite') }}</title>
    
    @include('../partials.head')
    
</head>
<body >
    <div id="app">
        @include('../partials.nav')
    
        @yield('content')

        @include('../partials.footer')
        
   </div>
</body>
</html>