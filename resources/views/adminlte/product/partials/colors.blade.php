@if($colors->isNotEmpty())
    <div class="row">
        @foreach($colors as $image)
            <div class="col-sm-3 image-color">
                <img class="img-responsive"
                     src="{{ asset(config('constants.storage_uploads') . $image->file) }}"
                     alt="{{ $image->name }}"/>
                <a href="#" class="btn btn-xs btn-danger color-delete" onclick="colorDelete({{ $image->id }}); return false;"><i class="fa fa-times"></i></a>
            </div>
        @endforeach
    </div>
@else
    <h4>Không có hình ảnh</h4>
@endif
