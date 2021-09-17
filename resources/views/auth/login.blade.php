@extends('layouts.signpages')

@section('content')
<div class="row s3" >
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
                              <input id="phone" class=" form-control fields s6"type="text" name="phone" placeholder="Phone" required autocomplete="Phone" autofocus>
                            </div>
                          </div>
                          <div class="row s9" >
                            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label  class="form-check-label s10" for="remember">
                    {{ __('Remember Me') }}
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
    

                      
                    </form>
        
@endsection
