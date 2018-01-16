@extends('adminlte.layout.master')
@section('heading')
    @lang('Quản lý thương hiệu')
@endsection
@section('breadcrumbs')
    <li><a href="{{ route('admin.brands')  }}">@lang('Thương hiệu')</a></li>
    <li class="active">@lang('Chỉnh sửa')</li>
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Chỉnh sửa thương hiệu')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <form class="form-horizontal" method="post"
              action="{{ action('Admin\BrandsController@update', ['id' => $brands->id]) }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">@lang('Tên')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="{{ $brands->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">@lang('Viết tắt')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="acronym" value="{{ $brands->acronym }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">@lang('Ngày thành lập')</label>
                    <div class="col-sm-10">
                        <div class="input-group date datetimepicker">
                            <input type="text" name="founded_at" class="form-control"
                                   value="{{ ($brands->founded_at) ? $brands->founded_at->format('d-m-Y') : '' }}"/>
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">@lang('Giới thiệu ngắn')</label>
                    <div class="col-sm-10">
                        <textarea name="excerpt" class="form-control" rows="3">{{ $brands->excerpt }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">@lang('Giới thiệu')</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="content" id="content"
                                  rows="10">{{ $brands->content }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">@lang('Title')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                               value="{{ $brands->title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">@lang('Keywords')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keywords"
                               placeholder="SEO Keywords" value="{{ $brands->keywords }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="seo_description" class="col-sm-2 control-label">@lang('Description')</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description"
                                  rows="4">{{ $brands->description }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Nhập lại')</button>
                <button type="submit" class="btn btn-info pull-right">@lang('Lưu')</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
@endsection
@section('header')
    <link rel="stylesheet"
          href="{{ asset('vendor/bower_dl/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('footer')
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendor/bower_dl/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {

            //editor
            CKEDITOR.replace('content');

            //slug
            $("form").submit(function () {
                $("input[name='slug']").val(slug($("input[name='slug']").val()));
            });

            $(".datetimepicker").datetimepicker({
                format: 'DD-MM-YYYY'
            });
        })
    </script>
@endsection