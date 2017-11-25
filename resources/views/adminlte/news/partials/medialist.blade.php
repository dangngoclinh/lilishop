@if($images->isNotEmpty())
    <ul class="media-list">
        @foreach($images as $image)
            <li class="media-item open-media" data-id="{{ $image->id }}"><img src="{{ asset(config('constants.storage_uploads') . $image->file) }}"
                                        alt="{{ $image->name }}"></li>
        @endforeach
    </ul>
@else
    <h3>Không có hình ảnh</h3>
@endif