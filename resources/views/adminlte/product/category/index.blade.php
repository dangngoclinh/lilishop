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
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th class="center">Sản Phẩm</th>
                        <th></th>
                    </tr>
                    @include('adminlte.partials.productcategory', ['categories' => $categories[0], 'tree' => $categories, 'prefix' => ''])
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    @else
        <h3>Chưa có category - <a href="{{ url(route('admin.product.category.create')) }}">Thêm Category</a></h3>
    @endif
@endsection