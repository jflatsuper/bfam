<div class="col-md-12">
    <div class="_14d25">

        @if(count($regCourses) > 0)
        <div class="row">
                @foreach($regCourses as $course)
                @if($course->course)
                    <div class="col-lg-3 col-md-4">
                        <div class="fcrse_1 mt-30">
                            <a href="{{route('student.course-details', $course->course->id)}}" class="fcrse_img">
                                <img src="{{$course->course->CourseCoverImage}}" alt="">
                                <div class="course-overlay">
                                    <div class="badge_seller">{{$course->course->category}}</div>
                                    <span class=""><i class="uil"></i></span>
                                    <div class="crse_timer">
                                        @if(count($course->course->sections) > 1)
                                        {{count($course->course->sections)}} modules
                                        @else
                                            {{count($course->course->sections)}} module
                                        @endif
                                    </div>
                                </div>
                            </a>
                            <div class="fcrse_content">
                                <div class="vdtodt">
                                    <span class="">Created: </span>
                                    <span class="vdt14">{{$course->course->created_at->diffForHumans()}}</span>
                                </div>
                                <a href="{{route('student.course-details', $course->course->id)}}" class="crse14s">{{$course->course->title}}</a>
                                <a href="{{route('student.course-details', $course->course->id)}}" class="crse-cate">{{$course->course->category}}</a>
                                <div class="auth1lnkprce">
                                    <div class="prce142" style="font-size: 80%"><a href="{{route('student.course-details', $course->course->id)}}">Go to course</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
        </div>
        @else
            <h1 class="cr1fot" style="color: white; text-align: center; font-size: 170%;width: 100%; " >You have not enrolled for any course</h1>
        @endif
    </div>
</div>
