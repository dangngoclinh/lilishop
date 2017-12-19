@if($images->isNotEmpty())
    <ul class="media-list">
        @foreach($images as $image)
            <li class="media-item small" onclick="modalImage('{{ $image->id }}')"><img
                        src="{{ asset(config('constants.storage_uploads') . $image->file) }}"
                        alt="{{ $image->name }}"></li>
        @endforeach
    </ul>
@else
    <h4>Không có hình ảnh</h4>
@endif
