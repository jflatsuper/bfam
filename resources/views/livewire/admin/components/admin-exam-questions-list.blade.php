<div class="certi_form">
    <div class="all_ques_lest">
        <hr/>


        @if(count($questions) > 0)
            @foreach($questions as $question)
                <div class="ques_item">
            <div class="ques_title">
                <span>Ques {{$question->sort}} :-</span>
                {{$question->question}}
            </div>
            <div class="ui form">
                <div class="grouped fields">

                    @if(count($question->options) > 0)
                        @foreach($question->options as $option)
                            <div class="field fltr-radio">
                                <div class="ui radio checkbox">
                                    @if($option->option === 'a')
                                        <label>A: {{$option->answer}} </label>
                                    @endif
                                        @if($option->option === 'b')
                                            <label>B: {{$option->answer}} </label>
                                        @endif
                                        @if($option->option === 'c')
                                            <label>C: {{$option->answer}} </label>
                                        @endif

                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
                <p>ANSWER: {{strtoupper($question->answer)}}</p>
                <a href="{{route('admin.edit-question', $question->id)}}">
                    <i class="fa fa-edit text-primary" style="cursor:pointer; margin-right: 20px"> Edit</i>
                </a>

                <i class="fa fa-trash text-danger" style="color: red !important; cursor:pointer;" wire:click="removeQuestion({{$question->id}})"> Remove</i>
                <br>@error('question_1') <span style="color: red" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
            @endforeach
        @endif

        <A href="{{route('admin.exam', $course->id)}}">
            <button type="button" class="btn btn-primary">
                ADD QUESTION
            </button>
        </A>

    </div>
</div>
