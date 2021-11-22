@extends('layouts.signpages')

@section('content')
<link  rel="stylesheet"  type="text/css" href="{{ url('css/app.css') }}">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@auth
@if (Route::has('login'))
<div class="fixed top-0 right-0 px-6 py-4 sm:block">
   
    @if (Route::has('admin'))
        <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline">Home</a>
        @elseif (Route::has('home'))
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">home</a>
        @endif

    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
   
</div>
@endif
@endauth
    <div class="row sx" >
      <h class="s4">Login to your account</h>
    </div>
  
            
                  
                      <form method="POST" action="{{ route('login') }}">
                          @csrf
          
                          <div class="row s5" >
                              <div class="col-lg-11">
                                <input id="email" class=" form-control fields s6"type="email" name="email" placeholder="Email" required autocomplete="Email" autofocus>
                              </div>
                            </div>
                            <div class="row s5" >
                                
                             
                              <div class="col-lg-11">
                              <input id="phone" class=" form-control fields s6" type="text" name="phone" placeholder="Phone" required autocomplete="Phone" autofocus >
                              </div>
                            </div>
                            
                           
                          
                            <div class="row s9" >
                              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label  class="form-check-label s10" for="remember">
                      {{ __('Remember my login') }}
                  </label>
                </div>
                            </div>
                           
                            <div class="row s11" >
                              <div class="col-lg-6">
                                <div class="col-xs-1 text-center" > 
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Login') }}
                                  </button>
                                   </div>
                              </div>
                              <div class="col-lg-4" >
                                  <h5 class="s12" ><a href="{{ route('register') }}">or Register</a></h5>
                                </div>
                            </div>
      
  
                        
                      </form>
  
   
</div>

@if (session('status'))
<script>
    $(document).ready(
       
        Swal.fire({

text:"{{session('status')}}",
icon: 'error',
confirmButtonText: 'Ok'
})
    );
</script>
@endif

        
@endsection
