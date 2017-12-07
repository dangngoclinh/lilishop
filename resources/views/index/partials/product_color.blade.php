<div class="box-field clearfix">
    <label>Chọn màu</label>
    <ul class="color-list">
        @php
            $set_color = false;
        @endphp
        @foreach($colors as $color)
            @if($color->pivot->quantity < 1)
                <li class="color-image sold-out"><img src="{{ media($color->image->small) }}"
                                                      alt="{{ $color->image->name }}"></li>
            @else
                @if($set_color == false)
                    <li class="color-image active"><img src="{{ media($color->image->small) }}"
                                                        alt="{{ $color->image->name }}"></li>
                    @php($set_color = true)
                @else
                    <li class="color-image"><img src="{{ media($color->image->small) }}"
                                                 alt="{{ $color->image->name }}"></li>
                @endif
            @endif
        @endforeach
    </ul>
</div>