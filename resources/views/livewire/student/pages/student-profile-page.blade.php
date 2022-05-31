@extends('layouts.student.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

{{--                <div class="section3125 mt-50">--}}
{{--                    <h4 class="item_title">My Courses</h4>--}}
{{--                    <div class="la5lo1">--}}
{{--                        @livewire('admin-all-course-list')--}}
{{--                    </div>--}}
{{--                </div>--}}


                    @livewire('student-profile')

            </div>
        </div>
@endsection
