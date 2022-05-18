@extends('layouts.auth.app')

@section('content')
    <link  rel="stylesheet"  type="text/css" href="{{asset('auth/css/app.css') }}">
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



   @livewire('user-login')


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
