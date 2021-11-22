@extends('adsettings')
@section('contents')
<form method="POST" action="{{ route('changedetails') }}"  class="col-lg-12 " >
    @csrf
    <div class="row">
      <div class="boxes col-lg-8 d9"  >
        <label style="margin-left: 3%" ><h5 class="d7"  >Update Profile</h5></label>
        <div  class="row " style="margin-left: 1%">
         
<div class="col-lg-6 d8"  >
<input id="first_name" class=" form-control fields d11" type="text" name="first_name" value="{{$val->first_name}} ">
</div>
<div class="col-lg-5 d8" >
<input  id="last_name" class=" form-control fields2 d11"type="text"  name="last_name" value="{{$val->last_name}}">
</div>

<div class="col-lg-12 row d8"  >
<div class="col-lg-12">
<input  class=" form-control fields " type="email" name="email" value="{{$val->email}}" readonly>
</div>
</div>
<div class="col-lg-12 row d8" >
    <div class="col-lg-12">
    <input  class=" form-control fields" type="text" name="country" value="{{$val->country}}" >
    </div>
    </div>



<div class="row" style="margin-left: 3%"><div class="col-xs-1 " > 
       <button class="btn btn-primary prcbtn"  type="submit" ><span>Update Profile</span></button>
   </div></div>
      </div>
      </div>
    </div>
</form>
@endsection