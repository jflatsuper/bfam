<form wire:submit.prevent="login">
    @csrf

    <div class="row s5" >
        <div class="col-lg-11">
            <input id="email" placeholder="Email" type="email" wire:model.lazy="email" class="form-control fields r10 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
    </div>
    <div class="row s5" >


        <div class="col-lg-11">
            <input id="phone" wire:model.lazy="phone" placeholder="Phone" type="text" class="form-control fields r10 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

        </div>
    </div>



    <div class="row s9" >
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label  class="form-check-label s10" for="remember">
                {{ __('Remember my login') }}
            </label>
        </div>
    </div>

    <div class="row s11" >
        <div class="col-lg-6">
            <div class="col-xs-1 text-center" >
                <button type="button" disabled wire:loading wire:target="login" class="btn btn-primary">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
                <button type="submit"  wire:loading.remove wire:target="login" class="btn btn-primary">
                    Login
                </button>
            </div>
        </div>
        <div class="col-lg-4" >
            <h5 class="s12" ><a href="{{ route('register') }}">or Register</a></h5>
        </div>
    </div>
</form>
