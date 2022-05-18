<div class="owl-carousel featured_courses owl-theme">

    @if($courses)
        @foreach($courses as $course)
            <div class="item">
                <div class="fcrse_1 mb-20">
                    <a href="{{route('admin.course-details', $course->id)}}" class="fcrse_img">
                        <img src="{{$course->CourseCoverImage}}" alt="">
                        <div class="course-overlay">
                            <div class="badge_seller">{{$course->category}}</div>
                            <div class="crse_reviews">
                                <i class='uil uil-star'></i>4.5
                            </div>
                            <span class="play_btn1"><i class="uil uil-play"></i></span>
                            <div class="crse_timer">
                                {{count($course->sections)}} sections
                            </div>
                        </div>
                    </a>
                    <div class="fcrse_content">
                        <div class="vdtodt">
                            <span class="">Created: </span>
                            <span class="vdt14">{{$course->created_at->diffForHumans()}}</span>
                        </div>
                        <a href="course_detail_view.html" class="crse14s">{{$course->title}}</a>
                        <a href="#" class="crse-cate">{{$course->category}}</a>
                        <div class="auth1lnkprce">
                            <p class="cr1fot">By <a href="#">Admin</a></p>
                            <div class="prce142">Free</div>
                            <button class="shrt-cart-btn" title="cart"><i class="uil uil-shopping-cart-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


</div>
