@if(count($categories) > 0)
    @foreach($categories as $category)
        @php
            $url = url(route('admin.product.category.edit',$category->id));
        $url_view = '';
        $url_destroy = url(route('admin.product.category.destroy', $category->id));
        @endphp
        <tr>
            <td><input type="checkbox" name="category[]"></td>
            <td>{{ $category->id }}</td>
            <td>{{ $prefix . '  ' . $category->name }}</td>
            <td class="center"><span class="badge bg-gray">0</span></td>
            <td>{{ $category->_lft }}</td>
            <td>{{ $category->_rgt }}</td>
            <td>
                <div class="btn-group hidden-tools">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url(route('admin.product.category.create')) }}">Thêm category</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ $url_view }}">Xem</a></li>
                        <li><a href="{{ $url }}">Chỉnh sửa</a></li>
                        <li><a href="{{ $url_destroy }}" class="delete-tag">Xóa</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        @if(isset($tree[$category->id]))
            @include('adminlte.partials.productcategory', ['categories' => $tree[$category->id], 'tree' => $tree, 'prefix' => $prefix . '¦&nbsp;&nbsp;&nbsp;&nbsp;'])
        @endif
    @endforeach
@endif