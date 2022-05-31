<nav class="vertical_nav">
    <div class="left_section menu_left" id="js-menu">
        <div class="left_section">
            <ul>
                <li class="menu--item">
                    <a href="{{route('student.dashboard')}}" class="menu--link @if(Route::currentRouteName() == 'student.dashboard') active @endif" title="Home">
                        <i class='uil uil-home-alt menu--icon'></i>
                        <span class="menu--label">Home</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="{{route('student.courses')}}" class="menu--link @if(Route::currentRouteName() == 'student.courses' || Route::currentRouteName() == 'admin.course-details') active @endif" title="Explore">
                        <i class='uil uil-book-alt menu--icon'></i>
                        <span class="menu--label">Courses</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="{{route('student.my-courses')}}" class="menu--link @if(Route::currentRouteName() == 'student.my-courses') active @endif" title="Explore">
                        <i class='uil uil-book-alt menu--icon'></i>
                        <span class="menu--label">My courses</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="{{route('student.exam')}}" class="menu--link @if(Route::currentRouteName() == 'student.exam') active @endif" title="Explore">
                        <i class='uil uil-book-alt menu--icon'></i>
                        <span class="menu--label">Certification</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="left_footer" style="position:fixed;
   left:0px;
   bottom:0px;">
            <div class="left_footer_content">
                <p>© {{ now()->year }} <strong>Loveworld</strong>. All Rights Reserved</p>
            </div>
        </div>
    </div>
</nav>
