<nav class="vertical_nav">
    <div class="left_section menu_left" id="js-menu">
        <div class="left_section">
            <ul>
                <li class="menu--item">
                    <a href="{{route('admin.dashboard')}}" class="menu--link @if(Route::currentRouteName() == 'admin.dashboard') active @endif" title="Home">
                        <i class='uil uil-home-alt menu--icon'></i>
                        <span class="menu--label">Home</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="{{route('admin.categories')}}" class="menu--link @if(Route::currentRouteName() == 'admin.categories') active @endif" title="Home">
                        <i class='uil uil-layers menu--icon'></i>
                        <span class="menu--label">Categories</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="{{route('admin.courses')}}" class="menu--link @if(Route::currentRouteName() == 'admin.courses' || Route::currentRouteName() == 'admin.course-details') active @endif" title="Explore">
                        <i class='uil uil-book-alt menu--icon'></i>
                        <span class="menu--label">Courses</span>
                    </a>
                </li>
                @if(count($categories) > 0)
                <li class="menu--item menu--item__has_sub_menu">
                    <label class="menu--link" title="Categories">
                        <i class='uil uil-layers menu--icon'></i>
                        <span class="menu--label">Category courses</span>
                    </label>
                    <ul class="sub_menu">

                        @foreach($categories as $category)
                        <li class="sub_menu--item">
                            <a href="{{route('admin.category-courses', $category->name)}}" class="sub_menu--link">{{$category->name}}</a>
                        </li>
                        @endforeach

                    </ul>
                </li>
                @endif
                <li class="menu--item">
                    <a href="{{route('admin.students')}}" class="menu--link @if(Route::currentRouteName() == 'admin.students') active @endif" title="Saved Courses">
                        <i class="uil uil-users-alt menu--icon"></i>
                        <span class="menu--label">Students</span>
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
