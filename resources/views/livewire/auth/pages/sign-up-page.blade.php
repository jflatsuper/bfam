@extends('layouts.auth.app')

@section('content')
    <link  rel="stylesheet"  type="text/css" href="{{ asset('auth/css/app.css') }}">


    <div class="row sq" >
        <h2 class="s4">Create your account</h2>
    </div>


    @livewire('student-register')
    </div>


@endsection
