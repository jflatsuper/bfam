@extends('layouts.admindash')
<!doctype html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.tiny.cloud/1/pophbs8udy47bnv4gtwpsbyqpjw5fz2j6gavsuzvsevjpy01/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@section('content')
<div  style="height:100%;padding-left:5%;padding-right:5%;width:100%;">
    <div style="color: #223D7C;padding-bottom:0%;">

    <h1>Add Course</h1>
    </div>
    <div style="width: 100%">
<form action="upload" method="POST" enctype= multipart/form-data >
@csrf
<div class="form-group row">


    <div class="col-md-8">
        <input id="CourseTitle" type="text" class="form-control @error('CourseTitle') is-invalid @enderror" name="CourseTitle" value="{{ old('CourseTitle') }}" placeholder="Title of Course"required autofocus>

        @error('CourseTitle')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">

    <div class="col-md-8">
        <script src="https://cdn.tiny.cloud/1/pophbs8udy47bnv4gtwpsbyqpjw5fz2j6gavsuzvsevjpy01/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <textarea style="height: 250px;border-radius:10px;white-space: pre-wrap;" id="Description" class=" description form-control @error('Description') is-invalid @enderror" name="Description" value="{{ old('Description') }}" placeholder="Explain the course" ></textarea>

        <script>
            tinymce.init({
                selector:'textarea.description',
                width: 850,
                height: 300
            });
        </script>
        @error('Description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">


    <div class="col-md-8">
        <input id="Comments" type="text" class="form-control @error('Comments') is-invalid @enderror" name="Comments" value="{{ old('Comments') }}" placeholder="Give a short statement ... or quote!"required autofocus>

        @error('Comments')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">


    <div class="col-md-8">
        <label style="width:100%" for="img">Add Course Thumbnail<span style="color: red;float:right">*Img<span></label>
        <input type="file"   class="form-control @error('Thumbnail') is-invalid @enderror"id="img" name="Thumbnail" accept="image/jpeg,image/jpg,image/bmp,image/raw" required>
        @error('Thumbnail')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message}}.Select a file with max dimensions 300*200</strong>
        </span>
        @enderror
    </div>

    <div class="col-md-8">
        <label style="width:100%" for="img">Add Course PDF<span style="color: red;float:right">*Pdf<span></label>
        <input type="file"   class="form-control @error('pdf') is-invalid @enderror"id="img" name="pdf" accept="pdf">
        @error('pdf')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message}}.Select a file with max dimensions 300*200</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">


    <div class="col-md-8">
        <label style="width:100%" for="img">Upload a video<span style="color: red;float:right">**Optional<span></label>
    <input type="file" class="form-control @error('videolinks') is-invalid @enderror" placeholder="add a videofile" id="videolinks" name="videolinks" accept="video/*" >

  </div>
</div>



<button class="btn btn-primary" type="submit">Create Course</button>
</form>
    </div>
    @if (session('status'))
    <script>
        $(document).ready(

            Swal.fire({

  text:"{{session('status')}}",
  icon: 'success',
  confirmButtonText: 'Ok'
})
        );
    </script>
    @endif
    @if (session('failed'))
    <script>
        $(document).ready(
            swal("{{ session('failed') }}")

        );
    </script>

@endif

</div>
@endsection
