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

                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6">
                                <div class="_215b03">
                                    <h2>{{$course->title}}</h2>
                                    <span class="_215b04">{{Str::limit($course->description, 100, $end='...')}}</span>
                                </div>
                                <div class="_215b05">
                                    {{count($course->enrolled)}} student(s) enrolled
                                </div>
                                <div class="_215b05">
                                    Last updated {{$course->created_at->diffForHumans()}}
                                </div>
                                <ul class="_215b31">
                                    @if($purchased)
                                        <li><a href="{{route('student.course-details', $course->id)}}"><button class="btn_adcart">
                                                    Go to course >>
                                                </button></a></li>
                                    @else
                                    <li>
                                        <button class="btn_buy" wire:loading wire:target="enroll({{$course->id}})">
                                            <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true" ></span>
                                        </button>
                                    </li>
                                    <li>
                                        <button wire:loading.remove wire:target="enroll({{$course->id}})" wire:click="enroll({{$course->id}})" class="btn_buy">
                                            Enroll now
                                        </button>
                                    </li>
                                    @endif


                                </ul>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
