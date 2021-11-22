@extends('layouts.admindash')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  

<div class="row" style="padding-bottom: 80px;">
  <div class="col-lg-8" style="max-width: 100%;align-items:center">
    <div style="height:100%;padding-left:5%;padding-right:5%;">
      
<div style="color: #223D7C;padding-bottom:5%">
<h1>{{$name->value('CourseTitle')}}</h1>


      </div>
      @if ($name->value('videolinks'))
      <video  id="doc-player"  controls  muted  class="cld-video-player cld-fluid"></video>
      <link href="https://unpkg.com/cloudinary-video-player@1.5.5/dist/cld-video-player.min.css" rel="stylesheet">
<script src="https://unpkg.com/cloudinary-core@latest/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/cloudinary-video-player@1.5.5/dist/cld-video-player.min.js" 
  type="text/javascript"></script>
  <script>
      var cld = cloudinary.Cloudinary.new({ cloud_name: "jflat", secure: true});
      var player = cld.videoPlayer('doc-player');
      player.source('{{$name->value('videolinks')}}.{{$filetype}}');
    </script>
      @endif
      <div style="color: red; text-align:center">
        <i>"{{$name->value('Comments')}}"</i>
      
      </div>
      <div>
       
       {!! $name->value('Description')!!}
      </div>
      
      </div>
    </div>
  
    
    
    <div class="col-lg-4" style="max-width: 100%;background-color:#dceee4;height:auto;border-radius:10px" id="z">
      <div style="color: #223D7C;padding-bottom:5%;width: 100%;text-align:center;padding-top:2%">
      <h1 >Comments</h1>
      </div>
      @foreach ($comments as $item)
      <div class="row" style="margin: 2%;background-color:white;border-radius:10px;height:auto">
        <div class="comment mt-4 text-justify " style="padding: 2%"> 
         
             <span style="font-size:15px"> <span style="font-size:20px;color:#223D7C;">{{$item->username}}</span></span><p> <span class="iconify" data-icon="gridicons:comment"> </span>  <span id="">{{$item->comment}}</span></p>
            <p style="color:grey">- {{$item->timestamp}}</p>
        
        </div>
        </div>
      @endforeach

     <div id="newcom"></div>
      
      <form method="post" style="height: 80px;margin:2%" action="" >
        @csrf
        <div class="input-group">
              <input class="form-control" type="text" id="comment" name="comment"  placeholder="+ Add a comment" style="border-radius: 10px" required>
              <div class="input-group-prepend">
                <button class="btn  btn-success" type="button" style="border-radius: 10px;">comment</button>
              </div>
              
            </div>
              <input hidden type="text" id="name" value="{{Auth::user()->first_name}}" required/>
              <input hidden type="text" id="id" value="{{$name->value('id')}}" required/>
            
              
            </form>
      
  </div>
  
 

</div>

 
    
        


      
    
     
  
     
<script type="text/javascript">


  $.ajaxSetup({
      headers: {
        'X-CSRF-Token': '{{ csrf_token() }}'
      }
  });

  $(".btn-success").click(function(e){

      e.preventDefault();

      var commented=document.getElementById("comment").value;
    var usernames=document.getElementById("name").value;
    var course=document.getElementById("id").value;
      var url = '{{ url('addcomment') }}';

      $.ajax({
         url:url,
         method:'POST',
         data:{
          comment:commented,
          username:usernames,
          course_id:course
              },
         success:function(data){
           var x=data[0];
           var y=data[1];
           var q;
          
          
            
             
               $("#newcom").append(
                 "<div class=\"row\" style=\"margin: 2%;background-color:white;border-radius:10px;height:auto\">"+
      "<div class=\"comment mt-4 text-justify \" style=\"padding: 2%\"> "+
       
        " <h4 style=\"#223D7C;\">"+data[0]+"</h4><p> <span class=\"iconify\" data-icon=\"gridicons:comment\"></span>  <span>"+data[1]+"</span></p>"+
          
      
      "</div>"+
      "</div>"

               );
     


            


         },
         error:function(error){
            console.log(error)
         }
      });
});

</script>
@endsection