@extends('layouts.admindash')

@section('content')

    <div style="max-width: 70%;align-items:center">
        <p>{{$us}}kkkkkkkk {{$c}}</p>
        <video style="height:100%; width:100%" id="doc-player"  controls  muted  class="cld-video-player cld-fluid"></video>
        <link href="https://unpkg.com/cloudinary-video-player@1.5.5/dist/cld-video-player.min.css" rel="stylesheet">
<script src="https://unpkg.com/cloudinary-core@latest/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/cloudinary-video-player@1.5.5/dist/cld-video-player.min.js" 
    type="text/javascript"></script>
    <script>
        var cld = cloudinary.Cloudinary.new({ cloud_name: "jflat", secure: true});
        var player = cld.videoPlayer('doc-player');
        player.source('{{$name}}.mp4');
      </script>
        </div>
@endsection