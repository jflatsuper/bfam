@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="st_title"><i class="uil uil-users-alt"></i> {{$course->title}}</h2>
                <p>Students who enrolled for this course</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @livewire('admin-course-student-list', ['course' => $course])
            </div>
        </div>
    </div>

@endsection
