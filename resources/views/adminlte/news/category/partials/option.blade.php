@if(count($categories) > 0)
    @foreach($categories as $item)
        @if(isset($category) && $category->parent_id == $item->id)
            <option value="{{ $item->id }}" selected>{{ $prefix . $item->name }}</option>
        @else
            <option value="{{ $item->id }}">{{ $prefix . $item->name }}</option>
        @endif
        @if(isset($tree[$item->id]))
            @include('adminlte.news.category.partials.option', ['categories' => $tree[$item->id], 'tree' => $tree, 'prefix' => $prefix . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'])
        @endif
    @endforeach
@endif