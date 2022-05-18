<div class="step-tab-panel step-tab-info active" id="tab_step1">
    <div class="tab-from-content">
        <div class="title-icon">
            <h3 class="title"><i class="uil uil-info-circle"></i>General Information</h3>
        </div>
        <form wire:submit.prevent="addCategory">
            <div class="course__form">
                <div class="general_info10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ui search focus mt-30 lbel25">
                                <label>Name</label>
                                <div class="ui left icon input swdh19">
                                    <input class="prompt srch_explore {{$errors->has('name')? 'is-invalid' : '' }}" wire:model.lazy="name" type="text" placeholder="Enter category name">
                                </div>
                                @error('name') <span style="color: crimson; font-size: 10px;" >{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="step-footer step-tab-pager">
                        <button type="button" disabled wire:loading wire:target="addCategory" class="btn btn-primary">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </button>
                        <button type="submit"  wire:loading.remove wire:target="addCategory" class="btn btn-primary">
                            CREATE CATEGORY
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
