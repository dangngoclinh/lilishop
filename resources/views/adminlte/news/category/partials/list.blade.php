<tr>
    <td><input type="checkbox" name="category_id[]"></td>
    <td>{{ $prefix . '  ' . $category->name }}</td>
    <td>{{ $category->slug }}</td>
    <td class="right">
        <div class="btn-group hidden-tools">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('news.category', $category->slug) }}" target="_blank">@lang('Xem')</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ route('admin.news.category.edit', $category->id) }}">@lang('Chỉnh sửa')</a></li>
                <li><a href="{{ route('admin.news.category.destroy', $category->id) }}">@lang('Xóa')</a></li>
            </ul>
        </div>
    </td>
    <td class="right">{{ $category->updated_at }}</td>
</tr>