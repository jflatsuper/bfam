@extends('layouts.admin.app')

@section('content')
    @livewire('admin-course-details', ['course' => $course])
@endsection
