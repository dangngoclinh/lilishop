@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    @include('adminlte.layout.partials.error')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Thêm thiết lập')</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal option-add" method="POST" action="{{ action('Admin\OptionController@store') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="key" class="col-sm-2 control-label">@lang('Từ khóa')</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="key" placeholder="Key"
                               value="{{ old('key') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="value" class="col-sm-2 control-label">@lang('Loại')</label>

                    <div class="col-sm-10">
                        <select class="form-control" name="input">
                            <option value="input">Input</option>
                            <option value="textarea">Textarea</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="value" class="col-sm-2 control-label">@lang('Mô tả')</label>

                    <div class="col-sm-10">
                        <textarea class="form-control" name="description"
                                  rows="3">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Nhập lại')</button>
                <button type="submit" class="btn btn-info pull-right">@lang('Thêm')</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
@endsection
@section('footer')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            /*            $("form").submit(function(event) {
                            event.preventDefault();
                            $(this).reset();
                        })*/
        })
    </script>
@endsection