<!-- Modal -->
@php
    $file = url(config('constants.storage_uploads') . $media->file);
    $medium = url(config('constants.storage_uploads') . $media->medium);
    $small = url(config('constants.storage_uploads') . $media->small);
@endphp
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <form id="form-modal-media" action="{{ action('Admin\MediaController@postEdit', $media->id) }}" method="post">
            {{ csrf_field() }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập Nhật thông tin hình ảnh</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">

                        <img style="width: 100%; margin-bottom: 20px;" src="{{ $medium }}"
                             alt="{{ $media->name }}" title="{{ $media->name }}">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image-file">@lang('Full')</label>
                            <div class="input-group input-group-sm">
                                <input id="image-file" type="text" class="form-control" name="file" value="{{ $file }}">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat copy"
                                                data-clipboard-target="#image-file">@lang('Copy!')</button>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image-medium">@lang('Medium')</label>
                            <div class="input-group input-group-sm">
                                <input id="image-medium" type="text" class="form-control" name="medium"
                                       value="{{ $medium }}">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat copy"
                                                data-clipboard-target="#image-medium">@lang('Copy!')</button>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image-small">@lang('Small')</label>
                            <div class="input-group input-group-sm">
                                <input id="image-small" type="text" class="form-control" name="small"
                                       value="{{ $small }}">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat copy"
                                                data-clipboard-target="#image-small">@lang('Copy!')</button>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">@lang('Tên')</label>
                    <input type="text" class="form-control" name="name" placeholder="Tên"
                           value="{{ $media->name }}">
                </div>
                <div class="form-group">
                    <label for="description">@lang('Description')</label>
                    <textarea name="description" class="form-control" rows="3">{{ $media->description }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <div class="msg"></div>
                <button type="button" class="btn btn-danger"
                        onclick="imageDelete({{ $media->id }})">@lang('Xoá')</button>
                <button type="button" class="btn btn-danger"
                        onclick="setFeatured({{ $media->id }})">@lang('Đặt làm ảnh Thumb')</button>
                <button type="button" class="btn btn-warning add-to-content">@lang('Insert')</button>
                <button type="submit" class="btn btn-info">@lang('Lưu')</button>
            </div>
        </form>
    </div>
</div>