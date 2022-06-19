<div class="step-tab-panel step-tab-info active" id="tab_step1">
    <div class="tab-from-content">
        <div class="title-icon">
            <h3 class="title"><i class="uil uil-info-circle"></i>{{$section->title}} | Sort: {{$section->sort}}</h3>
            <a href="{{route('admin.course-details', $section->course->id)}}" target="_blank">
                <button class="btn_adcart">
                    View details
                </button>
            </a>
        </div>
        <form action="{{route('admin.post-course-section-content')}}" method="post" enctype="multipart/form-data" >
            @csrf
            @if(session()->has('error'))
            <p class="badge badge-danger text-center"  style="text-align: center !important; font-size: 150%"" >{{session('error')}}</p>
            @endif
            @if(session()->has('success'))
            <h2 class="badge badge-success text-center"  style="text-align: center !important; font-size: 150%"" >{{session('success')}}</h2>
            @endif
            <div class="course__form">
                <div class="general_info10">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="ui search focus mt-30 lbel25">
                                <label>Sort*</label>
                                <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore {{$errors->has('sort')? 'is-invalid' : '' }}" wire:model.lazy="sort" name="sort" type="number" placeholder="Sorting order" minlength="1">
                                </div>
                                <input type="hidden" name="section_id" value="{{$section->id}}">
                                @error('sort') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="ui search focus mt-30 lbel25">
                                <label>Title*</label>
                                <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore {{$errors->has('title')? 'is-invalid' : '' }}" name="title" wire:model.lazy="title" type="text" placeholder="Insert section title.">
                                </div>
                                @error('title') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6">
                            <div class="ui search focus mt-30 lbel25">
                                <div wire:loading wire:target="video" >
                                    Validating video <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </div>
                                <label wire:loading.remove wire:target="video">Video*(max: 100mb)</label>
                                <div class="ui left icon input swdh19">
                                    <input name="video" class="prompt srch_explore {{$errors->has('video')? 'is-invalid' : '' }}" type="file">
                                </div>
                                @error('video') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="ui search focus mt-30 lbel25">
                                <div wire:loading wire:target="material" >
                                    Validating material <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </div>
                                <label wire:loading.remove wire:target="material">Material(Optional, pdf)</label>
                                <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore {{$errors->has('material')? 'is-invalid' : '' }}" name="material" type="file">
                                </div>
                                @error('material') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>


                    </div>

                    <div class="step-footer step-tab-pager">
                        <a href="{{route('admin.edit-course-section', $section->id)}}" class="btn btn-primary">
                            << PREVIOUS
                        </a>
                        <button type="button" disabled wire:loading wire:target="addContent" class="btn btn-primary">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </button>
                        <button type="submit" wire:loading.remove wire:target="addContent" class="btn btn-primary">
                            ADD CONTENT
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
