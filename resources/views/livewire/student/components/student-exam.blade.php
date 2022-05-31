<div class="row justify-content-md-center">




    @if($submitted)
    <div class="col-lg-7 col-md-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title126">
                        <h2 style="text-align: center">Result</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="faq1256">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="certi_form rght1528">
                        <div class="test_result_bg">
                            <ul class="test_result_left">
                                <li>
                                    <div class="result_dt">
                                        <i class="uil uil-check right_ans"></i>
                                        <p>Right<span>({{$score}})</span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="result_dt">
                                        <i class="uil uil-times wrong_ans"></i>
                                        <p>Wrong<span>({{3 - $score}})</span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="result_dt">
                                        <h4>{{$score * 5}}</h4>
                                        <p>Out of 15</p>
                                    </div>
                                </li>
                            </ul>
                            @if($score > 1)
                                <div class="col-xs-1 text-center" >

                                </div>
                                <div class="result_content">
                                    <h2>Congratulation! {{Auth::user()->last_name. '  ' .Auth::user()->first_name }}</h2>
                                    <p>You are eligible for this certificate</p>
{{--                                    <a href="#" wire:click="download" class="download_btn" >Download Certificate</a>--}}
                                    <button type="button" disabled wire:loading wire:target="download" class="btn btn-primary">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" wire:click="download"  wire:loading.remove wire:target="download" class="btn btn-primary">
                                        Download Certificate
                                    </button>
                                </div>
                            @else
                                <div class="result_content">
                                    <h2>Oh! We are sorry!</h2>
                                    <p>You are not eligible for this certificate</p>
                                    <a href="{{route('student.exam')}}"  class="btn btn-primary" >Try again</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @else
    <div class="col-lg-7 col-md-6">
        <ul class="nav nav-tabs slive_tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="add-streaming-tab" data-toggle="tab" href="#add-straming" role="tab" aria-controls="add-straming" aria-selected="true">Exam section</a>
            </li>
        </ul>
        <form wire:submit.prevent="submitAnswer">
            <div class="certi_form">
                <div class="all_ques_lest">
                    <h3 style="text-align: center">Please attend to all the questions on this page</h3>
                    <hr/>
                    <div class="ques_item">
                        <div class="ques_title">
                            <span>Ques 1 :-</span>
                            You may never know what your inheritance in Christ really means until…?
                        </div>
                        <div class="ui form">
                            <div class="grouped fields">
                                <div class="field fltr-radio">
                                    <div class="ui radio checkbox">
                                        <input type="radio" wire:model="question_1" name="question_1" tabindex="0"  value="A" class="hidden">
                                        <label>You go to church</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio"  wire:model="question_1" name="question_1" tabindex="0"  value="B" class="hidden">
                                        <label> You get into the Word of God to find out what your place in Christ is in the now!</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" wire:model="question_1" name="question_1" tabindex="0"  value="C" class="hidden">
                                        <label>You change your wardrobe</label>
                                    </div>
                                </div>
                            </div>
                            <br>@error('question_1') <span style="color: red" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="ques_item">
                        <div class="ques_title">
                            <span>Ques 2 :-</span>
                            God the Father has qualified you through?
                        </div>
                        <div class="ui form">
                            <div class="grouped fields">
                                <div class="field fltr-radio">
                                    <div class="ui radio checkbox">
                                        <input type="radio" wire:model="question_2" name="question_2"  value="A" tabindex="0" class="hidden">
                                        <label>Your friends</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" wire:model="question_2" name="question_2"  value="B" tabindex="0" class="hidden">
                                        <label>Your family members</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" wire:model="question_2" name="question_2"  value="C" tabindex="0" class="hidden">
                                        <label>His Son Jesus.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>@error('question_2') <span style="color: red" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="ques_item">
                        <div class="ques_title">
                            <span>Ques 3 :-</span>
                            What is the first theme scripture in this course title?
                        </div>
                        <div class="ui form">
                            <div class="grouped fields">
                                <div class="field fltr-radio">
                                    <div class="ui radio checkbox">
                                        <input type="radio"  wire:model="question_3" name="question_3"  value="A" tabindex="0" class="hidden">
                                        <label>Colossians 1:2</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio"  wire:model="question_3" name="question_3"  value="B" tabindex="0" class="hidden">
                                        <label>Genesis 1:2</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio"  wire:model="question_3" name="question_3"  value="C" tabindex="0" class="hidden">
                                        <label>Revelation 1:2</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>@error('question_3') <span style="color: red" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="group-form">
                    <button type="button" disabled wire:loading wire:target="submitAnswer" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </button>
                    <button type="submit"  wire:loading.remove wire:target="submitAnswer" class="btn btn-primary">
                        Submit Answer
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endif


</div>
