@if($colors->isNotEmpty())
    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
            <th>@lang('Tên màu')</th>
            <th class="right">@lang('Xóa')</th>
        </tr>
        <tbody>

        @foreach($colors as $image)
            <tr>
                <td><img class="img-responsive" style="width: 55px;"
                         src="{{ asset(config('constants.storage_uploads') . $image->small) }}"
                         alt="{{ $image->name }}"/></td>
                <td><input type="text" class="form-control typeahead" name="color_name[{{ $image->id }}]"
                           value="{{ $image->pivot->name }}"></td>
                <td class="right"><a href="#" class="btn btn-xs btn-danger"
                                     onclick="colorDelete({{ $image->id }}); return false;"><i class="fa fa-times"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </thead>
    </table>
@else
    <h4>Sản phẩm không có màu</h4>
@endif
