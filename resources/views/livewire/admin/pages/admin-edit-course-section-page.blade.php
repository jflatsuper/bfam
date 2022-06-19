@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="st_title"><i class="uil uil-analysis"></i>Edit module</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="course_tabs_1">
                    <div id="add-course-tab" class="step-app">
                        <div class="step-content">
                            @livewire('admin-edit-course-section-form', ['section'  => $section])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
