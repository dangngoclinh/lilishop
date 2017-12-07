@if($quantity > 0)
    <select name="quantity" id="quantity">
        @for($i = 1; $i <=$quantity; $i++)
            <option value="{{ $i }}">{{ $i }}</option>\
        @endfor
    </select>
@endif