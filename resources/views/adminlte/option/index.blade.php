@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    @include('adminlte.layout.partials.error')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Thiết lập website')</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="post" action="{{ action('Admin\OptionController@update') }}">
            {{ csrf_field() }}
            <div class="box-body">
                @foreach($options as $option)
                    <div class="form-group">
                        <label for="{{ $option->key }}" class="col-sm-2 control-label">{{ $option->key }}</label>
                        <div class="col-sm-7">
                            @switch($option->input)
                                @case('input')
                                <input type="input" class="form-control" name="value[{{ $option->key }}]"
                                       value="{{ $option->value }}">
                                @break

                                @case('textarea')
                                <textarea class="form-control" rows="3"
                                          name="value[{{ $option->key }}]">{{ $option->value }}</textarea>
                                @break
                                @case('editor')
                                <textarea class="form-control ckeditor" rows="5"
                                          name="value[{{ $option->key }}]">{{ $option->value }}</textarea>
                                @break
                            @endswitch
                        </div>
                        <div class="col-sm-3">
                            {{ $option->description }}
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Nhập lại')</button>
                <button type="submit" class="btn btn-info pull-right">@lang('Cập nhật')</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
@endsection
@section('footer')
    <script src="//cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>
    <script>
        $(function () {
            CKEDITOR.replace('.editor', {
                extraPlugins: 'image2',
                height: 450
            });
        })
    </script>
@endsection