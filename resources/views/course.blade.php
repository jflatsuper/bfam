@extends('layouts.app')

@section('content')

    <div class="cards" style="height:100%;padding-left: 3%">
   
        @foreach($name as $data)
        
          
        <div class="card" style="width:20%;
        border-color:white;
        border-radius:13px;
        text-align: left;
        height:40%;
        margin:2%;
        display: inline-block;
        overflow:hidden">
          @csrf
           
        <a href="{{ route('video',['videolinks'=>$data->videolinks])}}"><img src=" {{ $data->videolinks}}.jpg" class="card-img" style="width:100%;height:60%"/></a>
        <div class="card-title" style=" background-color:#dceee4;padding-left:3%;padding-bottom:3%;">
            <h5>
                {{ $data->CourseTitle}}
            </h5>
               <p style="color: grey">
                {{ $data->CourseCreator}} 
               </p>
                <p >
                   {{ $data->Comments}}
                </p>
            </div>
           
        
        </div>
           
                
            
        
        
        @endforeach
        </div>

@endsection