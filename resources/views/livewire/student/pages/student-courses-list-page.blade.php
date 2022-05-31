@extends('layouts.student.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
           @livewire('student-courses-list')
        </div>
    </div>
@endsection
