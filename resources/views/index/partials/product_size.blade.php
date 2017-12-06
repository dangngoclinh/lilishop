<div class="box-field clearfix">
    <label>Chọn màu</label>
    <ul class="color-list">
        @foreach($colors as $color)
            @if($color->pivot->quantity < 1)
                <li class="color-image sold-out"><img src="{{ media($color->image->small) }}"
                                                      alt="{{ $color->image->name }}"></li>
            @else
                <li class="color-image"><img src="{{ media($color->image->small) }}"
                                             alt="{{ $color->image->name }}"></li>
            @endif
        @endforeach
    </ul>
</div>