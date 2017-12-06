@if(count($categories) > 0)
    @foreach($categories as $item)
        <tr>
            @if(!empty($category_list) && in_array($item->id, $category_list))
                <td width="15px;">
                    <input class="product_category" type="checkbox" onclick="addCategory('{{ $item->id }}', this);"
                           checked/></td>
            @else
                <td>
                    <input class="product_category" type="checkbox" onclick="addCategory('{{ $item->id }}', this);"/>
                </td>
            @endif
            <td>{{ $prefix . $item->name }}</td>
        </tr>
        @if(isset($tree[$item->id]))
            @include('adminlte.product.partials.categories', ['categories' => $tree[$item->id], 'tree' => $tree, 'prefix' => $prefix . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'])
        @endif
    @endforeach
@endif