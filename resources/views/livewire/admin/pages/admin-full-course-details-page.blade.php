@extends('layouts.admin.app')

@section('content')
    @livewire('admin-full-course-details', ['course' => $course])
@endsection
