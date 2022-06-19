@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="st_title"><i class="uil uil-analysis"></i> Exam questions</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @livewire('admin-exam-questions-list', ['course'  => $course])
            </div>
        </div>
    </div>

@endsection
