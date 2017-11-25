@if($colors->isNotEmpty())
    <div class="row">
        @foreach($colors as $image)
            <div class="col-sm-3">
                <img class="img-responsive"
                     src="{{ asset(config('constants.storage_uploads') . $image->file) }}"
                     alt="{{ $image->name }}"/>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-info">Màu</button>
                    </div>
                    <!-- /btn-group -->
                    <input type="text" class="form-control">
                </div>
                <a href="" class="btn btn-xs btn-danger color-delete"><i class="fa fa-times"></i></a>
            </div>
        @endforeach
    </div>
    {{--    <ul class="media-list">
            @foreach($colors as $image)
                <li class="media-item open-media small"
                    data-url="{{ route('admin.product.edit.panel.imageitem', $image->id) }}"><img
                            src="{{ asset(config('constants.storage_uploads') . $image->file) }}"
                            alt="{{ $image->name }}"></li>
            @endforeach
        </ul>--}}
@else
    <h4>Không có hình ảnh</h4>
@endif
