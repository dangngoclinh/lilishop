<div id="modal-edit-item" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('Thêm Menu')</h4>
            </div>

            <form method="post" action="{{ action('Admin\MenusController@updateItem', ['id' => $item->id]) }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="label">@lang('Label')</label>
                        <input type="text" class="form-control" name="label" value="{{ $item->label }}">
                    </div>
                    <div class="form-group">
                        <label for="link">@lang('Link')</label>
                        <input type="text" class="form-control" name="link" value="{{ $item->link }}">
                    </div>
                    <div class="form-group">
                        <label for="class">@lang('Class')</label>
                        <input type="text" class="form-control" name="class" value="{{ $item->class }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">@lang('Lưu')</button>
                </div>
            </form>
        </div>

    </div>
</div>