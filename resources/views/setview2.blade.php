@extends('adsettings')
@section('contents')
<form  class="boxes col-lg-8 d6 " action="{{ route('changepic') }}" method="POST" enctype= multipart/form-data>
    @csrf

    <label style="margin-left:3%" ><h5 class="  " >Update Profile Photo</h5></label>
           
               
            <div class="col-lg-11 d8" >
                 <input type="file"   class="form-control @error('profpic') is-invalid @enderror" id="profpic" name="profpic" accept="image/*" required>
                @error('profpic')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message}}.Select a file with max dimensions 300*200</strong>
                </span>
            @enderror
            </div>
            <div class="row" style="margin-left: 3%"><div class="col-xs-1 " > 
                <button class="btn btn-primary prcbtn"  type="submit" ><span>Update Profile Photo</span></button>
            </div></div>
       

     
      

</form>
@endsection