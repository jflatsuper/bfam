<div class="wrapper _bg4586">
    <div class="modal vd_mdl fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    @if($course->sections->first())
                        @if($course->sections->first()->contents->first())
                            <video controls style="max-width: 100%" src="{{$course->sections->first()->contents->first()->VideoContent}}">

                            </video>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="_215b01">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section3125">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-5 col-md-6">
                                <div class="preview_video">
                                    <a href="#" class="fcrse_img" data-toggle="modal" data-target="#videoModal">
                                        <img src="{{$course->CourseCoverImage}}" alt="">
                                        <div class="course-overlay">
                                            <div class="badge_seller">{{$course->category}}</div>
                                            <span class="play_btn1"><i class="uil uil-play"></i></span>
                                            <span class="_215b02">Preview this course</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="_215b10">
                                    <a href="#" class="_215b11">
                                        <span><i class="uil uil-heart"></i></span> Sponsored by loveworld
                                    </a>

                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6">
                                <div class="_215b03">
                                    <h2>{{$course->title}}</h2>
                                    <span class="_215b04">{{Str::limit($course->description, 100, $end='...')}}</span>
                                </div>
                                <div class="_215b05">
                                    114,521 students enrolled
                                </div>
                                <div class="_215b05">
                                    Last updated {{$course->created_at->diffForHumans()}}
                                </div>
                                <ul class="_215b31">
                                    <li><a href="{{route('admin.edit-course', $course->id)}}"><button class="btn_adcart">
                                                Update course
                                            </button></a></li>
                                    <li><a href="{{route('admin.add-course-section', $course->id)}}"><button class="btn_adcart">
                                                Add section
                                            </button></a></li>
                                    <li>
                                        <button class="btn_buy" wire:loading wire:target="removeCourse({{$course->id}})">
                                            <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true" ></span>
                                        </button>
                                    </li>
                                    <li>
                                        <button wire:loading.remove wire:target="removeCourse({{$course->id}})" wire:click="removeCourse({{$course->id}})" class="btn_buy">
                                            Delete
                                        </button>
                                    </li>

                                </ul>
                                <div class="_215fgt1">
                                    Free for all candidate
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b15 _byt1458">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course_tabs">
                        <nav>
                            <div class="nav nav-tabs tab_crse justify-content-center" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses" role="tab" aria-selected="false">Courses Content</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b17">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course_tab_content">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-about" role="tabpanel">
                                <div class="_htg451">
                                    <div class="_htg452 mt-35">
                                        <h3>Description</h3>
                                        <p>
                                            {{$course->description}}
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-courses" role="tabpanel">
                                <div class="crse_content">
                                    <h3>Course content</h3>
                                    <div class="_112456">
                                        <ul class="accordion-expand-holder">
                                            <li><span class="accordion-expand-all _d1452">Expand all</span></li>
                                            {{--                                            <li><span class="_fgr123"> 402 lectures</span></li>--}}
                                            <li><span class="_fgr123">{{$course->created_at->diffForHumans()}}</span></li>
                                        </ul>
                                    </div>
                                    <div id="accordion" class="ui-accordion ui-widget ui-helper-reset">


                                        @if($course->sections)
                                            @foreach($course->sections as $section)
                                                <a href="javascript:void(0)" class="accordion-header ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all">
                                                    <div class="section-header-left">
                                                    <span class="section-title-wrapper">
                                                    <i class='uil uil-presentation-play crse_icon'></i>
                                                    <span class="section-title-text">{{$section->sort}}. {{$section->title}}</span>
                                                    </span>
                                                    </div>
                                                    <div class="section-header-right">
                                                        <span class="fa fa-edit" style="cursor:pointer; margin-right: 10px" wire:loading.remove wire:target="editSection({{$section->id}})" wire:click="editSection({{$section->id}})"></span>
                                                        <span class="spinner-border spinner-border-sm " style="margin-right: 10px" role="status" aria-hidden="true" wire:loading wire:target="editSection({{$section->id}})"></span>


                                                        <span class="fa fa-plus" style="cursor:pointer; margin-right: 10px" wire:loading.remove wire:target="addContent({{$section->id}})" wire:click="addContent({{$section->id}})"></span>
                                                        <span class="spinner-border spinner-border-sm " style="margin-right: 10px" role="status" aria-hidden="true" wire:loading wire:target="addContent({{$section->id}})"></span>

                                                        <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true" wire:loading wire:target="removeSection({{$section->id}})"></span>
                                                        <span class="fa fa-trash" style="cursor:pointer;" wire:loading.remove wire:target="removeSection({{$section->id}})" wire:click="removeSection({{$section->id}})"></span>
                                                    </div>
                                                    <div class="section-header-right">

                                                        <span class="num-items-in-section">{{count($section->contents)}} lectures</span>
                                                        <span class="section-header-length">{{$section->updated_at->diffForHumans()}}</span>
                                                    </div>
                                                </a>
                                                <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
                                                    @if($section->contents)
                                                        @foreach($section->contents as $content)
                                                            <div class="lecture-container">
                                                                <div class="left-content">
                                                                    <i class='uil uil-file icon_142'></i>
                                                                    <div class="top">
                                                                        <div class="title">
                                                                            {{$content->title}}
                                                                            @if($content->material)
                                                                             <a target="_blank" href="{{$content->VideoMaterial}}"><span class="fa fa-file-archive"></span> Material</a>
                                                                            @endif
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="details">
                                                                    <span style="cursor:pointer; margin-right: 50px" >{{$content->sort}}</span>

                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" wire:loading wire:target="remove({{$content->id}})"></span>
                                                                    <span class="fa fa-trash" style="cursor:pointer;" wire:loading.remove wire:target="remove({{$content->id}})" wire:click="remove({{$content->id}})"></span>

                                                                    <span class="content-summary">{{$content->created_at->diffForHumans()}}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                </div>
                                            @endforeach
                                        @endif



                                    </div>

                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
