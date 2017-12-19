<tr>
    @if(!empty($category_list) && in_array($category->id, $category_list))
        <td width="15px;">
            <input class="news_category" type="checkbox" value="{{ $category->id }}"
                   onclick="addCategory('{{ $category->id }}', this);"
                   checked/>
        </td>
    @else
        <td width="15px;">
            <input class="news_category" type="checkbox" value="{{ $category->id }}"
                   onclick="addCategory('{{ $category->id }}', this);"/></td>
    @endif
    <td>{{ $prefix . $category->name }}</td>
</tr>