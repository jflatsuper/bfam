@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="st_title"><i class="uil uil-analysis"></i> Add exam questions</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @livewire('admin-edit-exam-question-form', ['question'  => $question])
            </div>
        </div>
    </div>

@endsection
