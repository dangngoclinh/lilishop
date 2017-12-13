@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Danh sách danh mục')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox" name="check_all"></th>
                    <th>Tên</th>
                    <th>Slug</th>
                    <th></th>
                    <th class="right">Ngày Cập Nhật</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $traverse = function ($categories, $prefix = '') use (&$traverse) {
                        foreach ($categories as $category) {
                            echo view('adminlte.news.category.partials.list', compact('category', 'prefix'))->render();
                            $traverse($category->children, $prefix.'¦&nbsp;&nbsp;&nbsp;&nbsp;');
                        }
                    };
                $traverse($categories);
                @endphp
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="button" class="btn btn-danger">@lang('Xóa')</button>
            <button type="button" class="btn btn-primary pull-right">@lang('Thêm danh mục')</button>
        </div>
    </div>
    <!-- /.box -->
@endsection