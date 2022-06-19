<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>E-learning</title>

    <link rel="icon" type="image/png" href="{{asset('images/fav.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel='stylesheet'>
    <link href='{{asset('vendor/unicons-2.0.1/css/unicons.css')}}' rel='stylesheet'>
    <link href="{{asset('css/vertical-responsive-menu.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/night-mode.css')}}" rel="stylesheet">

    <link href="{{asset('css/vertical-responsive-menu1.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/instructor-dashboard.css')}}" rel="stylesheet">
    <link href="{{asset('css/instructor-responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery-steps.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/OwlCarousel/assets/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/OwlCarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/semantic/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
    @livewireStyles
</head>
<body>

<header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
        <i class='uil uil-bars'></i>
    </button>
    <button id="collapse_menu" class="collapse_menu">
        <i class="uil uil-bars collapse_menu--icon "></i>
        <span class="collapse_menu--label"></span>
    </button>
    <div class="main_logo" id="logo">
        <a href="{{route('admin.dashboard')}}"><img style="max-width: 100%;"  src="{{asset('images/bfam.png')}}" alt=""></a>
        <a href="{{route('admin.dashboard')}}"><img class="logo-inverse" style="max-width: 100%;" src="{{asset('images/bfam.png')}}" alt=""></a>
    </div>
    <div class="search120">
        <div class="ui search">
{{--            <div class="ui left icon input swdh10">--}}
{{--                <input class="prompt srch10" type="text" placeholder="Search for Tuts Videos, Tutors, Tests and more..">--}}
{{--                <i class='uil uil-search-alt icon icon1'></i>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="header_right">
        <ul>
            <li>
                <a href="{{route('admin.create-course')}}" class="upload_btn" title="Create New Course">Create New Course</a>
            </li>

            <li class="ui dropdown">
                <a href="#" class="opts_account" title="Account">
                    <img src="{{asset('images/hd_dp.jpg')}}" alt="">
                </a>
                <div class="menu dropdown_account">
                    <div class="channel_my">
                        <div class="profile_link">
                            <img src="{{asset('images/hd_dp.jpg')}}" alt="">
                            <div class="pd_content">
                                <div class="rhte85">
                                    <h6>{{Auth::user()->last_name. '  '.Auth::user()->first_name }}</h6>
                                    <div class="mef78" title="Verify">
                                        <i class='uil uil-check-circle'></i>
                                    </div>
                                </div>
                                <span><a href="https://gambolthemes.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ec8b8d818e8380d5d8dfac8b818d8580c28f8381">{{\Illuminate\Support\Facades\Auth::user()->email}}</a></span>
                            </div>
                        </div>
{{--                        <a href="my_instructor_profile_view.html" class="dp_link_12">View Instructor Profile</a>--}}
                    </div>
                    <div class="night_mode_switch__btn">
                        <a href="#" id="night-mode" class="btn-night-mode">
                            <i class="uil uil-moon"></i> Night mode
                            <span class="btn-night-mode-switch">
<span class="uk-switch-button"></span>
</span>
                        </a>
                    </div>
{{--                    <a href="instructor_dashboard.html" class="item channel_item">Update profile</a>--}}
                    <a href="{{route('logout')}}" class="item channel_item">Sign Out</a>
                </div>
            </li>
        </ul>
    </div>
</header>


<x-admin-vertical-nav />



@if(Route::currentRouteName() == 'admin.course-details')
    @yield('content')
@else

    <div class="wrapper">
        <div class="sa4d25">
            @yield('content')
        </div>

        <footer class="footer mt-30" style="

  ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_bottm">
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <ul class="fotb_left">
                                        <li>
                                            <a href="index-2.html">
                                                <div class="footer_logo">
                                                    <img src="images/logo1.svg" alt="">
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <p>© {{ now()->year }} <strong>Loveworld</strong>. All Rights Reserved.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endif


@livewireScripts
<script src="{{asset('js/vertical-responsive-menu.min.js')}}"></script>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/OwlCarousel/owl.carousel.js')}}"></script>
<script src="{{asset('vendor/semantic/semantic.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/night-mode.js')}}"></script>
<script  src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/jquery-steps.min.js')}}"></script>

<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
</script>
</body>

</html>
