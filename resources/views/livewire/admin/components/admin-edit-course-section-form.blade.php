<div class="step-tab-panel step-tab-info active" id="tab_step1">
    <div class="tab-from-content">
        <div class="title-icon">
            <h3 class="title"><i class="uil uil-info-circle"></i>{{$section->title}}</h3>
        </div>
        <form wire:submit.prevent="updateSection">
            <div class="course__form">
                <div class="general_info10">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="ui search focus mt-30 lbel25">
                                <label>Section Title*</label>
                                <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore {{$errors->has('title')? 'is-invalid' : '' }}" wire:model.lazy="title" type="text" placeholder="Insert section title.">
                                </div>
                                @error('title') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="ui search focus mt-30 lbel25">
                                <label>Sort*</label>
                                <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore {{$errors->has('sort')? 'is-invalid' : '' }}" wire:model.lazy="sort" type="number" placeholder="Sorting order" minlength="1">
                                </div>
                                @error('sort') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>


                    </div>

                    <div class="step-footer step-tab-pager">
                        <button type="button" disabled wire:loading wire:target="updateSection" class="btn btn-primary">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </button>
                        <button type="submit"  wire:loading.remove wire:target="updateSection" class="btn btn-primary">
                            UPDATE SECTION
                        </button>
                        <a class="btn btn-outline-secondary" href="{{route('admin.course-details', $section->course->id)}}"><< Go back to course</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>