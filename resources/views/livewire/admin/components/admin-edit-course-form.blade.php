<div class="step-tab-panel step-tab-info active" id="tab_step1">
    <div class="tab-from-content">
        <div class="title-icon">
            <h3 class="title"><i class="uil uil-info-circle"></i>General Information</h3>
        </div>
        <form wire:submit.prevent="updateCourse">
            <div class="course__form">
                <div class="general_info10">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="ui search focus mt-30 lbel25">
                                <label>Course Title*</label>
                                <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore {{$errors->has('title')? 'is-invalid' : '' }}" wire:model.lazy="title" type="text" placeholder="Insert your course title." name="title" data-purpose="edit-course-title" maxlength="60" id="main[title]" value="">

                                </div>
                                @error('title') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="mt-30 lbel25">
                                <label>Course Category* {{$category}}</label>
                            </div>
                            <select wire:model.lazy="category"  style="border-radius: 40px; height: 40px;" class="ui hj145 form-control  cntry152 prompt srch_explore ">
                                <option value="">Select Category</option>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="mt-1 lbel25">
                                @error('category') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="course_des_textarea mt-30 lbel25">
                                <label>Course Description*</label>
                                <div class="course_des_bg">
                                    <div class="textarea_dt">
                                        <div class="ui form swdh339">
                                            <div class="field">
                                                <textarea rows="5" class="{{$errors->has('description')? 'is-invalid' : '' }}" name="description" wire:model="description" id="id_course_description" placeholder="Insert your course description"></textarea>
                                            </div>
                                            @error('description') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="ui search focus mt-30 lbel25">
                                <div wire:loading wire:target="image" >
                                    Validating cover image <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </div>
                                <label wire:loading.remove wire:target="image">Course Cover Image*(480x270)</label>
                                <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore {{$errors->has('image')? 'is-invalid' : '' }}" wire:model.lazy="image" type="file">
                                </div>
                                @error('image') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="step-footer step-tab-pager">
                        <button type="button" disabled wire:loading wire:target="updateCourse" class="btn btn-primary">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </button>
                        <button type="submit"  wire:loading.remove wire:target="updateCourse" class="btn btn-primary">
                           NEXT >>
                        </button>
                        <a class="btn btn-outline-secondary" href="{{route('admin.course-details', $course->id)}}"><< Go back to course</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
