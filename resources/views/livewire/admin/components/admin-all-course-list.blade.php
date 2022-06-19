<div class="col-md-12">
    <div class="_14d25">
        <div class="col-lg-6 col-md-6" wire:ignore>
            <div class="mt-30 lbel25">
                <label>Course Categories</label>
            </div>
            <select wire:ignore.self wire:model="category" style="border-radius: 40px; height: 40px;" class="ui hj145 form-control  cntry152 prompt srch_explore">
                <option value="">All categories</option>
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

        @if(count($courses) > 0)
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-lg-3 col-md-4">
                        <div class="fcrse_1 mt-30">
                            <a href="{{route('admin.course-details', $course->id)}}" class="fcrse_img">
                                <img src="{{$course->CourseCoverImage}}" alt="">
                                <div class="course-overlay">
                                    <div class="badge_seller">{{$course->category}}</div>
                                    <span class=""><i class="uil "></i></span>
                                    <div class="crse_timer">
                                        @if(count($course->sections) > 1)
                                            {{count($course->sections)}} modules
                                        @else
                                            {{count($course->sections)}} module
                                        @endif

                                    </div>
                                </div>
                            </a>
                            <div class="fcrse_content">
                                <div class="vdtodt">
                                    <span class="">Created: </span>
                                    <span class="vdt14">{{$course->created_at->diffForHumans()}}</span>
                                </div>
                                <a href="{{route('admin.course-details', $course->id)}}" class="crse14s">{{$course->title}}</a>
                                <a href="#" class="crse-cate">{{$course->category}}</a>
{{--                                <div class="auth1lnkprce">--}}
{{--                                    @if(App\Models\StudentRegisteredCourses::where('user_id', Auth::user()->id)->where('course_id', $course->id)->first())--}}
{{--                                        <div class="prce142" style="font-size: 80%"><a href="{{route('student.course-details', $course->id)}}">Go to course</a></div>--}}
{{--                                    @else--}}
{{--                                        <div class="prce142" style="font-size: 80%"><a href="{{route('student.course-preview', $course->id)}}">Enroll</a></div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <h1 class="cr1fot" style="color: white; text-align: center; font-size: 170%;width: 100%; " >No course is currently available</h1>
        @endif
    </div>

</div>
