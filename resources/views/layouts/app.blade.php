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
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
   
   <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
     
      

      <script type="text/javascript">
       $(document).ready(function(){
  $("#sidebarCollapse").click(function(){
    $("#sidebar").toggleClass('active');
    $("#content").toggleClass('active');
  });
});
    </script>
    <style>
    body{
  font-family: Poppins!important;
  background-color: #F4F7FA!important;
  }
  
  .side1{

      background-color: #26274E;
      /* height: 100vh; */
      color: white;
      
      
  }
  
  .side2{
  
  margin-left: 5.5%;
  margin-top: 2%;
      
  
      
  }
  
  
  
  .trans23
  {
      width: 20%;
      margin-left: 3%;
      
  }
  .trans2
  {
    width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
      
  
      
  }
  .flex-child{
      width: 100%;
      text-align: center;
      margin-bottom: 5%;
  
  }
  .flex-child h5{
      color: gray;
  }
  
  
  ul.wrap{
      
    text-indent: -22%;
    margin-bottom: 10%;
    list-style-type: none;
    font-size: 93%;
    padding: 5%!important;
      
  }
  ul.wrap li{
      text-indent: 5%;
      margin-bottom: 10%;
      list-style-type: none;
      font-size: 110%;
      padding: 5%	;
  }
  .supportbtn{
      text-align: center;
      background-color: #0D34B2;
      height:40%;
      width: 70%;
      font-size: 130%;
      
      border-radius: 50px;
      
  }
  .flex-container{
      margin-bottom: 15%;
  }
  .glb{
      color: blue;
      float: right;
      font-size: 120%;
  
  }
  .crtpj{
      float: right;
      background-color: #0D34B2;
      border-color: #0D34B2;
      width: 40%;
      border-radius: 30px;
  
  }
  .div1{
      background-color: #DFE5F5;
      border-radius:2%;
      margin-top: 2%;
      height:60vh;
      
  }
   .meactive{color: #0D34B2}
  #passchange form{display:none;}
  
  
  .spacepass{
    padding-bottom: 4%;
  }
  .passheight{
    height: 120%;
  }

  #sidebarCollapse{
    display: none;
  }
  input{
    height: 120%;
    border-radius: 20px!important;
    border-color: #9393d4!important;
    display: block;
    width: 100%!important;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow 0.15s ease-in-out;
  }
  .boxes{
  
    border-radius: 10px;
    background-color: white;
     padding-left: 2%;
  }
  form{
    /* padding-left: 2%; */
    height: 37vh;
  }
  .fields, .fields2{
  
    border-color: blue;
  }
  .btn{
   background-color:  #0D34B2!important;
  }
  .none{
    background-color: none;
  }
  .x2{
      float:right;
      margin-top:-3%;
      height:60%;
      width:25%
  }
  .d1{padding-top: 10%;}
  .d2{padding:4%;}
  .d3{padding-right: 5%;}
  .d4{list-style-type: none; font-size:200%;}
  .d5{padding-top: 2% ;padding-left: 5%;}
  .d6{padding-top:2%;}
  .d7{padding-bottom:2%}
  .d8{padding-bottom:5%;}
  .d9{padding-top:2%;height: 37vh;}
  .d10{padding-bottom:2%}
  .d11{width: 100%;}
  .d12{padding-top:5%;}
  .d13{width: 100% ;height: 100% ; border-radius: 15px; border-color: blue;color: grey;}
  .d14{padding-top:5%;}
  .d15{border-color: blue;}
  .d16{ display: flex;
    justify-content: center;
    align-items: center;
    height: 37vh}
  .d17{
    justify-content: center;
    align-items: center;}
  
  .d18{width: 50%; margin-left: 23%;}
  .d19{text-align: center;font-size: 100%;}
  .d20{padding-top:2%;}
  .d21{padding-bottom:2%;
  }
  .d22{
    right: auto !important;
    text-align: center !important;
    transform: translate(0%, 0) !important;
    padding-bottom: 2%;}
  .d23{width: 100% ;color: grey ;height: 120%;border-color: blue;border-radius:10px;}
  
  
  .f1{
   padding-top:6%; 
   padding-left:2%;
   padding-right:4%;
    background-color:#dceee4;
  }
  .f2{ color: #223D7C;
  background-color:#dceee4;
  height:20%;
  
 

    margin-bottom: 50px;
} 
  .f3{margin-top:4%;}
  .f4{color: #0D34B2;font-size: 270%;font-weight: 600; }
  .f5{margin-top:3%;}
  
  .f6{ display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;}
  .f7{ justify-content: center;
    align-items: center;}
  .f8{width: 33%; margin-left: 33%;}
  
  .f9{text-align: center;font-size: 120%;  color: gray;}
  
  * {
    list-style: none;
  }
  
  body {
    font-family: 'Inter', sans-serif;
    background: #fff;
  }
  
  p {
    font-family: 'Inter', sans-serif;
  }
  
  a,
  a:hover,
  a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.4s;
  }
  
 /* Side Bar */
 .wrapper {
    display: flex;
    text-decoration: none;
    transition: all 0.4s;
  }
    
    
  .choosef{
	margin-top: 5%;
	border-style:dashed  ;

	border-width: 1px;
	border-radius: 30px;
	height: 150px;
	border-color: blue;
	width: 70%;
	display: flex;
	align-items: center;
	justify-content: center;
	margin-left: 15%;
	color: grey;
	

}
.t8{display: none;}
  
  #sidebar {
    min-width: 250px;
    max-width: 250px;
    background:#223D7C;
    color: #fff;
    transition: all 0.4s;
    height: 100vh;
    font-size:25px;
  }
  
  #sidebar.active {
    margin-left: -250px;
  }
  div.some-class {
    display: inline-block;
    width: 50%;
}
  
  #sidebar .sidebar-header {
    padding: 20px;
    background: #1b1d24;
  }
  
  #sidebar ul.components {
    padding: 20px 0;
    /* border-bottom: 1px solid #47748b; */
  }
  
  #sidebar ul p {
    color: #fff;
    padding: 10px;
  }
  #content{
    width: 100%;
    height:100vh;
   
    
  }
 
  #content.active{
    width: 92%;

  }
  #sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
  }
  
  #sidebar ul li a:hover {
    color: #262933;
    background: #fff;
  }
  
  #sidebar ul li.active>a,
  a[aria-expanded="true"] {
    color: #fff;
    background: #1b1d24;
  }
  
  a[data-toggle="collapse"] {
    position: relative;
  }
  
  .dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20%;
    transform: translateY(-50%);
  }
  .ilt{
      padding-right:3%;

  }
  ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #1b1d24;
  }
  .fx{
    display: none;
  }
  @media (max-width: 768px) {
    #sidebar {
      margin-left: -250px;
    }
  .x2{
    margin-top:-1%;
  }
    #sidebar.active {
      margin-left: 0;
    }
    #sidebarCollapse{
    display: block;
  }
   
    #content.active{
      width: 100%;
    }
    .f53{
      display: none;
    }
    .fx{
      display: block;
    }
   
    
    #sidebarCollapse span {
      display: none;
    }
  }
    </style>
</head>
<body>
<div class="wrapper">
  <nav id="sidebar">
             <div class="flex-container" class="logo">
                          <div  class="flex-container" style="height:150px;width:150px;border-radius:50%;background-color:black;margin-left:50px;margin-top:5%; overflow: hidden;vertical-align:middle;text-align: center;
  position: relative;display: inline-block;"> 
                      <a class="goback" href="">
                            <img src="{{Auth::user()->profphoto}}" class="trans2"/>
                          </a>
                          </div>
                           
                       
                              
                              <div class="flex-child">
                                  
                                  <a class="aref" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                  Logout</a>

                              </div>
                        
                   </div>
                    <div class="col-md-12 ">
            <div class="list-container text-white p-4">
              <ul class="mt-1 wrap">
              <a class="aref" href="home"> <li> 
                     
                     Dashboard 
                </li></a>
                <a class="aref" href="course"><li>   
                    
                    Courses
</li></a>


                    <a class="aref" href="setting"><li>          
                  Settings</li></a>
                
              </ul>
            </div>
          </div>
          <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
           
  </nav>
  <div id="content" style="overflow-y: scroll;">


<div class=" f2" >
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn btn-dark">
      <span class="iconify" data-icon="akar-icons:chevron-left"></span>
      </button>
    </div>
  </nav>


    <h2 class="f1"> Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}  <img class ="x2" src="../storage/images/BFAM-Bible-Club.png"></h2>
  
   
   

    </div>




                   
                   
                 
        <main class="py-4" style="height:70%">
            @yield('content')
        </main>
    </div>
    </div>
    
</body>
</html>
