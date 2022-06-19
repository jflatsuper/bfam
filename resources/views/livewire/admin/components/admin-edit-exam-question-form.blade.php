<form wire:submit.prevent="updateQuestion">
    <div class="course__form">
        <div class="general_info10">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="ui search focus mt-30 lbel25">
                        <label>Sort*</label>
                        <div class="ui left icon input swdh19">
                            <input class="prompt srch_explore {{$errors->has('sort')? 'is-invalid' : '' }}" wire:model.lazy="sort" type="number" placeholder="Sorting order" minlength="1">
                        </div>
                        @error('sort') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="course_des_textarea mt-30 lbel25">
                        <label>Question*</label>
                        <div class="course_des_bg">
                            <div class="textarea_dt">
                                <div class="ui form swdh339">
                                    <div class="field">
                                        <textarea rows="5" class="{{$errors->has('question')? 'is-invalid' : '' }}" name="description" wire:model="question" id="id_course_description" placeholder="Enter the question here..."></textarea>
                                    </div>
                                    @error('question') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr />
            <h4>Options</h4>
            <div class="row">


                @foreach($c_question->options as $option)
                    @if($option->option === 'a')
                        <div class="col-lg-6 col-md-6">
                            <div class="ui search focus mt-30 lbel25">
                                <label>A*</label>
                                <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore {{$errors->has('a')? 'is-invalid' : '' }}" wire:model.lazy="a" type="text" placeholder="Option A">
                                </div>
                                @error('a') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>
                    @endif
                        @if($option->option === 'b')
                            <div class="col-lg-6 col-md-6">
                                <div class="ui search focus mt-30 lbel25">
                                    <label>B*</label>
                                    <div class="ui left icon input swdh19">
                                        <input class="prompt srch_explore {{$errors->has('b')? 'is-invalid' : '' }}" wire:model.lazy="b" type="text" placeholder="Option B">
                                    </div>
                                    @error('b') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endif

                        @if($option->option === 'c')
                            <div class="col-lg-6 col-md-6">
                                <div class="ui search focus mt-30 lbel25">
                                    <label>C*</label>
                                    <div class="ui left icon input swdh19">
                                        <input class="prompt srch_explore {{$errors->has('c')? 'is-invalid' : '' }}" wire:model.lazy="c" type="text" placeholder="Option C">
                                    </div>
                                    @error('c') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endif
                @endforeach


                <div class="col-lg-6 col-md-6">
                    <div class="ui search focus mt-30 lbel25">
                        <label>Correct Answer*</label>
                        <div class="ui left icon input swdh19">
                            <select wire:model.lazy="answer" style="border-radius: 40px; height: 40px;" class="ui hj145 form-control  cntry152 prompt srch_explore ">
                                <option value="">Select answer to the question</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                            </select>
                        </div>
                        @error('answer') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>

            <div class="step-footer step-tab-pager mt-2">
                <button type="button" disabled wire:loading wire:target="updateQuestion" class="btn btn-primary">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
                <button type="submit"  wire:loading.remove wire:target="updateQuestion" class="btn btn-primary">
                    UPDATE QUESTION
                </button>

                <A href="{{route('admin.exam-list', $c_question->course->id)}}">
                    <button type="button" class="btn btn-warning">
                        ALL QUESTIONS
                    </button>
                </A>
            </div>
        </div>
    </div>
</form>
