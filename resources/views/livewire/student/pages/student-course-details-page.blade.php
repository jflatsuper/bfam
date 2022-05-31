@extends('layouts.student.app')

@section('content')
    @livewire('student-course-details', ['course' => $course])
@endsection
