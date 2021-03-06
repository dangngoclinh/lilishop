@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="btn-group box-menu">
        <a href="{{ route('admin.product.category') }}" class="btn btn-info btn-flat">Danh sách</a>

        <a href="{{ route('admin.product.category.create') }}" class="btn btn-info btn-flat">Thêm
            Kho</a>
    </div>
    @if($categories)
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Danh sách tin tức</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="check_all"></th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th class="center">Sản Phẩm</th>
                        <th>Left</th>
                        <th>Right</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @include('adminlte.partials.productcategory', ['categories' => $categories[0], 'tree' => $categories, 'prefix' => ''])
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-danger">@lang('Xóa')</button>
                <a class="btn btn-primary pull-right" href="{{ route('admin.product.category.create') }}">@lang('Thêm danh mục mới')</a>
            </div>
        </div>
        <!-- /.box -->
    @else
        <h3>Chưa có category - <a href="{{ url(route('admin.product.category.create')) }}">Thêm Category</a></h3>
    @endif
@endsection