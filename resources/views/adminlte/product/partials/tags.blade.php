@if($tags->isNotEmpty())
    @foreach($tags as $tag)
        <span class="tag" data-id="{{ $tag->id }}">{{ $tag->name }}</span>
    @endforeach
@else
    <h4>Không có hình ảnh</h4>
@endif