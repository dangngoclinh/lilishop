@if(count($categories) > 0)
    @foreach($categories as $category)
        @php
            $url = route('admin.news.category.edit', ['id' => $category->id]);
            //echo '<tr><td><pre>';
            //var_dump($tree['$category->id']);
            //echo '</pre></td></tr>';
        //die();
        @endphp
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $prefix . '  ' . $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
                <a href="{{ $url }}" class="btn btn-danger btn-xs news_delete"><i class="fa fa-pencil"></i></a>
            </td>
        </tr>
        @if(isset($tree[$category->id]))
            @include('adminlte.news.category.partials.list', ['categories' => $tree[$category->id], 'tree' => $tree, 'prefix' => $prefix . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'])
        @endif
    @endforeach
@endif