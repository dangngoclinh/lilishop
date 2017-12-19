@if($featured)
    <img src="{{ media($featured->medium) }}" alt="{{ $featured->name }}" class="img-thumbnail news-image">
@else
    <h3>Chưa có ảnh đại diện</h3>
@endif