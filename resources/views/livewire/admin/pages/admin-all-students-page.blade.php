@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="st_title"><i class="uil uil-users-alt"></i> All students</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="all_msg_bg">

                    <div class="channel_my item all__noti5">
                        <div class="profile_link">
                            <img src="{{asset('images/left-imgs/img-1.jpg')}}" alt="">
                            <div class="pd_content">
                                <h6>Rock William</h6>
                                <p class="noti__text5"><strong>Joined:</strong>  <span class="nm_time">2 min ago</span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
