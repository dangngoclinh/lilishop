@if($tags->isNotEmpty())
    <ul class="tag-list">
        @foreach($tags as $tag)
            <li>
                <span class="tag" data-id="{{ $tag->id }}">{{ $tag->name }}</span>
                <button type="button" class="btn btn-danger btn-xs pull-right"
                        onclick="deleteTag('{{ $tag->id }}'); return false;"><i class="fa fa-times"></i></button>
            </li>
        @endforeach
    </ul>
@else
    <h4>@lang('Chưa có tags')</h4>
@endif