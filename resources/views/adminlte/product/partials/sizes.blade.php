@if($sizes->isNotEmpty())
    @foreach($sizes as $size)
    <div class="btn-group btn-size">
        <button type="button" class="btn btn-default btn-flat">{{ $size->name }}</button>
        <button type="button" class="btn btn-default btn-flat" onclick="siteDelete('{{ $size->id }}', sizeLoad); return false;">
            <i class="fa fa-times"></i>
        </button>
    </div>
    @endforeach
@else

@endif

