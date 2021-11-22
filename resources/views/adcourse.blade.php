@extends('layouts.admindash')

@section('content')


<link  rel="stylesheet"  type="text/css" href="{{ url('font-awesome-4.7.0/css/font-awesome.min.css') }}">

<div class="cards" style="height:100%;padding-left: 3%;padding-right:3%">
    
   @if (count($on)>0)
   <h2 style="margin:2%;">Current Courses</h2> 
       
  
   @foreach($on as $data)

  
   <div class="card" style="width:300px;
   border-color:white;
   border-radius:10px;
   text-align: left;
   height:200px;
   margin:2%;
   display: inline-block;
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   background-color:rgba(220,238,228, 0.5);
   overflow:hidden">
     @csrf
      
   <img src=" {{ $data->imglink}}" class="card-img" style="width:100%;height:60%"/>
   
   <div class="card-title" style="background-color:rgba(220,238,228, 0.5);padding-left:3%;padding-bottom:3%;">
       <h5 style="margin-left:0%;">
           {{ $data->CourseTitle}}
       </h5>
          <p style="color: grey;margin:2%">
            <div class="row">
            <div style="width: 55%;overflow:hidden;padding-left:4%">{{ $data->CourseCreator}} </div>
             <div style="width: 40%;"><a style=" float:right;margin-left:2px"href="{{ route('delete',['ids'=>$data->id])}}" class="btn btn-primary end"><i class="fa fa-minus" aria-hidden="true"></i></a>
           <a  style="float:right" href="{{ route('watch',['id'=>$data->id])}}" class="btn btn-primary"><i class="fa fa-play" aria-hidden="true"></i></i></a>
             </div>
            </div>
          </p>
          
         
   </div>  
   </div>
      
           
       
   
   
   @endforeach
   @endif

<h2 style="margin:2%;">New Courses</h2>
@if (count($name)>0)
@foreach($name as $data)

  
<div class="card" style="width:300px;
border-color:white;
border-radius:10px;
text-align: left;
height:200px;
margin:2%;
display: inline-block;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
background-color:rgba(220,238,228, 0.5);
overflow:hidden">
  @csrf
   
<img src=" {{ $data->imglink}}" class="card-img" style="width:100%;height:60%;background-color:white"/>

<div class="card-title" style="background-color:rgba(220,238,228, 0.5);padding-left:3%;padding-bottom:3%;">
    <h5 style="margin-left:0%;">
        {{ $data->CourseTitle}}
    </h5>
    <div style="color:grey">{{ $data->CourseCreator}}   <a style=" float:right;"href="{{ route('add',['id'=>$data->id])}}" class="btn btn-primary">Enroll </a>
    </div>

       
   
</div>
</div>
   
        
    


@endforeach
@else
<div style=" margin:2%;width: 98%;  text-align:center;background-color:rgba(220,238,228, 0.5);height:250px;justify-content:center;align-items:center;display:flex">
    <h2 style="text-shadow: 2px 2px 8px #7c7878; vertical-align: middle;">No new Courses! &#128546;</h2>
</div>
@endif
</div>
@endsection