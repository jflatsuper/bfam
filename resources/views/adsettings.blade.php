@extends('layouts.admindash')

@section('content')
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>


 <div class="row" >
    <div class = "container-left col-lg-1 d3"  >
        <ul class="d4" > <li> 
            <a id = "linkone" class="meactive"   
    href = "/changenumber" > <span class="iconify" data-icon="mdi:phone"></span></a></li > <li > 
        <a id = "linktwo"  class="meactive"  
    href = "/changeprofilepicture" ><span class="iconify" data-icon="ant-design:picture-filled"></span></a></li > <li >
         <a id = "linkthree" class="meactive"   
    href = "/changedetails" > <span class="iconify" data-icon="mdi:card-account-details-outline"></span></a></li > </ul>
       
     </div>
     <div class="col-lg-8" >
         @yield('contents')
    
     </div>
 </div>
@endsection