<div class="col-md-12">
    <div class="_14d25">

        @if(count($regCourses) > 0)
        <div class="row">
                @foreach($regCourses as $course)
                    <div class="col-lg-3 col-md-4">
                        <div class="fcrse_1 mt-30">
                            <a href="{{route('student.course-details', $course->course->id)}}" class="fcrse_img">
                                <img src="{{$course->course->CourseCoverImage}}" alt="">
                                <div class="course-overlay">
                                    <div class="badge_seller">{{$course->course->category}}</div>
                                    <span class="play_btn1"><i class="uil uil-play"></i></span>
                                    <div class="crse_timer">
                                        {{count($course->course->sections)}} sections
                                    </div>
                                </div>
                            </a>
                            <div class="fcrse_content">
                                <div class="vdtodt">
                                    <span class="">Created: </span>
                                    <span class="vdt14">{{$course->course->created_at->diffForHumans()}}</span>
                                </div>
                                <a href="{{route('student.course-details', $course->id)}}" class="crse14s">{{$course->course->title}}</a>
                                <a href="#" class="crse-cate">{{$course->course->category}}</a>
                                <div class="auth1lnkprce">
                                    <p class="cr1fot">By <a href="#">Admin</a></p>
                                    <div class="prce142">Free</div>
                                    <button class="shrt-cart-btn" title="cart"><i class="uil uil-shopping-cart-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        @else
            <h1 class="cr1fot" style="color: white; text-align: center; font-size: 170%;width: 100%; " >You have not enrolled for any course</h1>
        @endif
    </div>
</div>
