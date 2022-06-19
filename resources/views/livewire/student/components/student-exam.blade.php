<div class="row justify-content-md-center">

    @if($noExam)
        <div class="col-lg-7 col-md-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="result_content">
                            <h2>Oh! We are sorry!</h2>
                            <p>There is no examination available for this course</p>
                            <a href={{route('student.course-details', $course->id)}}#" class="btn btn-primary" > << Back to course </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        @if($isCompleted)
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
                                                @if($score)
                                                    <p>Right<span>({{$score}})</span></p>
                                                @else
                                                    <p>Right<span>(0)</span></p>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="result_dt">
                                                <i class="uil uil-times wrong_ans"></i>
                                                <p>Wrong<span>({{count($course->questions) - $score}})</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="result_dt">
                                                <h4>{{$score}}</h4>
                                                <p>Out of {{count($course->questions)}}</p>
                                            </div>
                                        </li>
                                    </ul>
                                    @if(($score / count($course->questions) * 100) > 50 )
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
                                            <a href="#" wire:click="tryAgain"  class="btn btn-primary" >Try exam again?</a>
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
                    <p>There are {{count($course->questions)}} to be answered, Please be sure of your answer before moving to the next </p>
                    <hr/>

                    <div class="ques_item">
                        <div class="ques_title">
                            <span>Ques {{$question->sort}} :-</span>
                            {{$question->question}}
                        </div>

                        <div class="ui form">
                            <div class="grouped fields">
                                @foreach($question->options as $option)
                                    @if($option->option === 'a')
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input type="radio" wire:model="answer" name="{{$question->id}}" tabindex="0"  value="{{$option->option}}" class="hidden">
                                                <label> {{$option->answer}}!</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if($option->option === 'b')
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input type="radio"  wire:model="answer"  name="{{$question->id}}"  tabindex="0"  value="{{$option->option}}" class="hidden">
                                                <label> {{$option->answer}}!</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if($option->option === 'c')
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input type="radio"  wire:model="answer" name="{{$question->id}}"  tabindex="0"  value="{{$option->option}}" class="hidden">
                                                <label> {{$option->answer}}!</label>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <br>@error('answer') <span style="color: red" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                    </div>

                </div>
                <div class="group-form mb-5">
                    <button type="button" disabled wire:loading wire:target="submitAnswer" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </button>
                    <button type="submit"  wire:loading.remove wire:target="submitAnswer" class="btn btn-primary">
                        Submit Answer
                    </button>
                </div>

                @if($isFirst == false)
                    <button type="button"  wire:click="previous" class="btn btn-outline-primary">
                        << Previous
                    </button>
                @endif

                @foreach($course->questions as $quest)
                    <button type="button"  wire:click="toQuestion({{$quest->sort}})" class="btn @if($quest->sort === $question->sort) btn-primary @else btn-outline-primary @endif">
                        {{$quest->sort}}
                    </button>
                @endforeach

                @if($isLast == false)
                    <button type="button"  wire:click="next" class="btn btn-outline-primary">
                        Next >>
                    </button>
                @endif

            </div>

        </form>
    </div>
    @endif

    @endif



</div>
