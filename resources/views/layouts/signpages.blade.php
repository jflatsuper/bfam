<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link  rel="stylesheet"  type="text/css" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins"/>


    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  
<div class="container-fluid" id="app">
    <div class="row"> 
   
        <div  class="col-lg-6 picpart">
        
           
        </div>
        <div class="col-lg-6 sign1">
        <div class="cont">
             <div class="row pic">
             <a  href="" >
                <img src="../storage/images/BFAM-Bible-Club.png" class="compt" id="logo"/>
                </a>
             </div>
           
            @yield('content')
            
         </div>
         </div>
    </div>
 </div>

</body>
</html>
