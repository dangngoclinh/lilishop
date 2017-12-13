@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Thêm Tag')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <form class="form-horizontal" method="post" action="{{ action('Admin\TagController@store') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">@lang('Tên Tag')</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="@lang('Tên')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">@lang('Slug')</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" placeholder="@lang('slug')">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Nhập Lại')</button>
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
            $("input[name='name']").keyup(function () {
                $("input[name='slug']").val(slug($("input[name='name']").val()));
            });

            $("form").submit(function (event) {
                $("input[name='slug']").val(slug($("input[name='slug']").val()));
            });
        })
    </script>
@endsection