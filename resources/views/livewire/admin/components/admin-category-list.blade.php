<div class="step-tab-panel step-tab-info active" id="tab_step1">
    <div class="tab-from-content">
        <div class="title-icon">
            <h4 class="title"><i class="uil uil-info-circle"></i>Available categories</h4>
        </div>

        @if($categories)
        <ul>
            @foreach($categories as $category)
            <li>{{$loop->index + 1}}. {{$category->name}} &nbsp; &nbsp;
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" wire:loading wire:target="remove({{$category->id}})"></span>
                <span class="fa fa-trash" style="cursor:pointer;" wire:loading.remove wire:target="remove({{$category->id}})" wire:click="remove({{$category->id}})"></span>
            </li>
            @endforeach
        </ul>
            <br>
        @endif

    </div>
</div>
