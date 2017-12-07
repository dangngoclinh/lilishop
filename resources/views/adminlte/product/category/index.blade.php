@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
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
                <button class="btn btn-danger">Xóa</button>
                <button class="btn btn-primary pull-right">Thêm Category</button>
            </div>
        </div>
        <!-- /.box -->
    @else
        <h3>Chưa có category - <a href="{{ url(route('admin.product.category.create')) }}">Thêm Category</a></h3>
    @endif
@endsection