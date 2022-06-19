@extends('layouts.student.app')

@section('content')
    <div class="container-fluid">
        @livewire('student-exam', ['course' => $course])
    </div>
@endsection
