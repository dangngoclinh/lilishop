@if($sizes)
    <select name="select-size" onchange="fn_set_size(this);">
        @foreach($sizes as $size)
            <option value="{{ $size->id }}">{{ $size->size->name }}</option>
        @endforeach
    </select>
@endif