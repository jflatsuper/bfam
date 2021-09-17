@extends('layouts.admindash')

@section('content')
<form action="upload" method="POST" enctype= multipart/form-data>
@csrf
<div class="form-group row">
    <label for="CourseTitle" class="col-md-4 col-form-label text-md-right">{{ __('CourseTitle') }}</label>

    <div class="col-md-6">
        <input id="CourseTitle" type="text" class="form-control @error('CourseTitle') is-invalid @enderror" name="CourseTitle" value="{{ old('CourseTitle') }}" required autofocus>

        @error('CourseTitle')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

    <div class="col-md-6">
        <input id="Description" type="textarea" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{ old('Description') }}" required autofocus>

        @error('Description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="Comments" class="col-md-4 col-form-label text-md-right">{{ __('Comments') }}</label>

    <div class="col-md-6">
        <input id="Comments" type="text" class="form-control @error('Comments') is-invalid @enderror" name="Comments" value="{{ old('Comments') }}" required autofocus>

        @error('Comments')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group">
              
    <input type="file" class="t8" id="videolinks" name="videolinks" >
    <div class="choosef"><label for="videolinks" >Click to choose Video</label></div>
  </div>

<button type="submit">Upload</button>
</form>
@endsection