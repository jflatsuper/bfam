<div class="all_msg_bg">
    @if(count($students) > 0)
        @foreach($students as $student)
    <div class="channel_my item all__noti5">
        <div class="profile_link">
            <img src="{{$student->user->userImage}}" alt="">
            <div class="pd_content">
                <h6>{{$student->user->last_name. '  '. $student->user->first_name}}</h6>
                <p class="noti__text5"><strong>Email:</strong>  <span class="nm_time">{{$student->user->email}}</span>  <strong>Phone:</strong>  <span class="nm_time">{{$student->user->phone}}</span></p>
                <p class="noti__text5"> <strong>Country:</strong>  <span class="nm_time">{{$student->user->country}}</span> <strong>Joined:</strong>  <span class="nm_time">{{$student->user->created_at->diffForHumans()}}</span></p>
                <p class="noti__text5"> <strong>Enrolled In:</strong>
                    @if(count($student->user->enrolled) > 1)
                        <span class="nm_time">{{count($student->user->enrolled)}} courses</span>
                    @else
                        <span class="nm_time">{{count($student->user->enrolled)}} course</span>
                    @endif

                </p>

            </div>
        </div>
    </div>
        @endforeach

        <div>
        </div>

            <div class="row" style="margin: 10px">
                <div class="col-lg-6 col-md-6">
                    <div class="ui search focus mt-30 lbel25">
                        <label>From*</label>
                        <div class="ui left icon input swdh19">
                            <input class="prompt srch_explore {{$errors->has('from')? 'is-invalid' : '' }}" wire:model.lazy="from" type="date">
                        </div>
                        @error('from') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="ui search focus mt-30 lbel25">
                        <label>To*</label>
                        <div class="ui left icon input swdh19">
                            <input class="prompt srch_explore {{$errors->has('to')? 'is-invalid' : '' }}" wire:model.lazy="to" type="date">
                        </div>
                        @error('to') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <button type="button" wire:click="download" class="btn btn-primary mt-4 mb-4 ml-4">
                Download as CSV
            </button>
    @else
        <h1 class="cr1fot" style="color: white; text-align: center; font-size: 170%;width: 100%; " >No student is currently available on this platform</h1>
    @endif


</div>
