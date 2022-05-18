@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="st_title"><i class="uil uil-analysis"></i> Add course section</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="course_tabs_1">
                    <div id="add-course-tab" class="step-app">
                        <ul class="step-steps">
                            <li class="active">
                                <a href="#tab_step1">
                                    <span class="number"></span>
                                    <span class="step-name">General Information</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#tab_step2">
                                    <span class="number"></span>
                                    <span class="step-name">Add sections</span>
                                </a>
                            </li>
                            <li>
                                <a href="#tab_step3">
                                    <span class="number"></span>
                                    <span class="step-name">Course Content</span>
                                </a>
                            </li>
                            <li>
                                <a href="#tab_step4">
                                    <span class="number"></span>
                                    <span class="step-name">View Information</span>
                                </a>
                            </li>
                        </ul>
                        <div class="step-content">
                            @livewire('add-course-section-form', ['course'  => $course])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
