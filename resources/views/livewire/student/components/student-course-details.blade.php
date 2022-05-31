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
                <div class="col-xl-8 col-lg-8">
                    <div class="section3125">
                        <div class="live1452">
{{--                            <video controls style="max-width: 100%" src="{{$course->sections->first()->contents->first()->VideoContent}}">--}}

{{--                            </video>--}}

                            @if($currentContent)
                                @if($currentContent !== 1)
                                    <video controls autoplay style="max-width: 100%" src="{{$currentContent->VideoContent}}">

                                    </video>
                                @else
                                    <img width="100%" src="{{asset('images/courses/add_video.jpg')}}" alt="">
                                @endif
                            @endif
                        </div>
                        <div class="user_dt5">
                            <div class="user_dt_left">
                            </div>
                            <div class="user_dt_right">
                                <ul>
                                    <li>
                                        <a href="#" class="lkcm152"><i class='uil uil-eye'></i><span>{{count($course->enrolled)}}</span></a>
                                    </li>
{{--                                    <li>--}}
{{--                                        <a href="#" class="lkcm152"><i class='uil uil-thumbs-up'></i><span>100</span></a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="lkcm152"><i class='uil uil-thumbs-down'></i><span>20</span></a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="lkcm152"><i class='uil uil-share-alt'></i><span>9</span></a>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="right_side">
                        <div class="fcrse_3">
                            <div class="cater_ttle">
                                <h4>Course sections</h4>
                            </div>
                            <div class="live_chat">
                                <div class="chat1">
                                    <div class="crse_content">
                                        <div class="_112456">
                                            <ul class="accordion-expand-holder">
                                                <li><span class="accordion-expand-all _d1452" style="color: white;">Expand all</span></li>
                                                {{--                                            <li><span class="_fgr123"> 402 lectures</span></li>--}}
{{--                                                <li><span class="_fgr123">{{$course->created_at->diffForHumans()}}</span></li>--}}
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
                                                                                <span style="cursor: pointer" wire:click="select({{$content->id}})">{{$content->title}}</span>
                                                                                @if($content->material)
                                                                                    <a target="_blank" href="{{$content->VideoMaterial}}"><span class="fa fa-file-archive"></span> Material</a>
                                                                                @endif
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="details">
                                                                        <span style="cursor:pointer; margin-right: 50px" >{{$content->sort}}</span>

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
    <div class="_215b15 _byt1458" wire:ignore.self>
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
                                    <div class="student_reviews">
                                        <div class="row">
                                            <div class="review_right">
                                                <div class="review_right_heading">
                                                    <h3>Comments</h3>

                                                </div>
                                            </div>
                                            <div class="review_all120">

                                                @if(count($comments) > 0)
                                                    @foreach($comments as $comment)
                                                    <div class="review_item">
                                                    <div class="review_usr_dt">
                                                        <img src="{{$comment->user->UserImage}}" alt="">
                                                        <div class="rv1458">
                                                            <h4 class="tutor_name1">{{$comment->user->last_name. '  '.$comment->user->first_name  }}</h4>
                                                            <span class="time_145">{{$comment->created_at->diffForHumans()}}</span>
                                                        </div>
                                                    </div>
                                                    <p class="rvds10">{{$comment->comment}}</p>
                                                    <div class="rpt100">
                                                    </div>
                                                </div>
                                                    @endforeach
                                                @endif
                                                <form wire:submit.prevent="addComment">
                                                    <div class="course__form">
                                                        <div class="general_info10">
                                                            <div class="row mb-1">
                                                                <div class="col-lg-12">
                                                                    <div class="ui search focus mt-30 lbel25">
                                                                        <label>Add comment</label>
                                                                        <div class="field">
                                                                            <textarea rows="5" class="{{$errors->has('comment')? 'is-invalid' : '' }} form-control" name="description" wire:model="comment" placeholder="Type your comment here"></textarea>
                                                                        </div>
                                                                        @error('comment') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="step-footer step-tab-pager ">
                                                                <button type="button" disabled wire:loading wire:target="addComment" class="btn btn-primary">
                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                </button>
                                                                <button type="submit"  wire:loading.remove wire:target="addComment" class="btn btn-primary">
                                                                    DROP COMMENT
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
    </div>

</div>
