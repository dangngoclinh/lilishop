<tr>
    <td><input type="checkbox" name="category_id[]"></td>
    <td>{{ $prefix . '  ' . $category->name }}</td>
    <td>{{ $category->slug }}</td>
    <td>

    </td>
    <td class="right">{{ $category->updated_at }}</td>
</tr>