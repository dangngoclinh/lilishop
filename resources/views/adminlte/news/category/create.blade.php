@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    @include('adminlte.layout.partials.error')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Thêm danh mục')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <form class="form-horizontal" method="post" action="{{ action('Admin\News\CategoryController@store') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">@lang('Tên danh mục')</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="@lang('Tên danh mục')" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">@lang('Slug')</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" placeholder="@lang('Slug')" value="{{ old('slug') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">@lang('Vị trí')</label>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control">
                            <option value="">- Cấp độ gốc -</option>
                            @php
                                $traverse = function ($categories, $prefix = '') use (&$traverse) {
                                    foreach ($categories as $category) {
                                    echo '<option value="'.$category->id.'">
                                            '.$prefix.'  '.$category->name.'</option>';
                                        $traverse($category->children, $prefix.'¦&nbsp;&nbsp;&nbsp;&nbsp;');
                                    }
                                };

                                $traverse($categories);
                            @endphp
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Nhập Lại</button>
                <button type="submit" class="btn btn-info pull-right">Thêm</button>
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