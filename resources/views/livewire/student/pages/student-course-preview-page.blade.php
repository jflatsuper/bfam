@extends('layouts.student.app')

@section('content')
    @livewire('student-course-preview', ['course' => $course])
@endsection
