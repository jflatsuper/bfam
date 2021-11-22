@extends('adsettings')
@section('contents')
<form method="POST" action="{{ route('changeno') }}" class="col-lg-8 boxes d6" >
    @csrf
    <label style="margin-left:3%" ><h5 class="  " >Update Phone Number</h5></label>
    <div class="col-lg-11 d8"  >
<input  class=" form-control fields" type="text"  value="{{$val}}" readonly>
</div>

     <div class="col-lg-11 d8"  >
<input  class=" form-control fields" type="text" id="phone"name="phone" placeholder="New Phone">
</div>

 
     <div class="row" style="margin-left:4%" ><div class="col-xs-1 " > 
     <button class="btn btn-primary prcbtn" type="submit"><span>Update Number</span></button>
 </div></div>
      
 </form>
@endsection