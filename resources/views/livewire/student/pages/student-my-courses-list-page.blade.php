@extends('layouts.student.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
           @livewire('student-my-courses-list')
        </div>
    </div>
@endsection
