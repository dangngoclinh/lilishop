{{--@foreach($categories as $category)
    <tr>
        <td><input type="checkbox" name="category[]" value="{{ $category->id }}"/></td>
        <td>{{ $category->name }}</td>
    </tr>

@endforeach--}}
{{--$categories
$catgory_list
$tree
$prefix--}}
@if(count($categories) > 0)
    @foreach($categories as $item)
        <tr>
            @if(!empty($category_list) && in_array($item->id, $category_list))
                <td width="15px;"><input class="news_category" type="checkbox" name="category[]" value="{{ $item->id }}" checked/></td>
            @else
                <td><input class="news_category" type="checkbox" name="category[]" value="{{ $item->id }}"/></td>
            @endif
            <td>{{ $prefix . $item->name }}</td>
        </tr>
        @if(isset($tree[$item->id]))
            @include('adminlte.news.partials.category', ['categories' => $tree[$item->id], 'tree' => $tree, 'prefix' => $prefix . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'])
        @endif
    @endforeach
@endif