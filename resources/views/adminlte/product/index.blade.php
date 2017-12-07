@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('header')
@endsection
@section('content')
    <form action="" method="post">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Quản lý sản phẩm</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm sản phẩm">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="check_all" value="Y" title="Chọn / bỏ chọn tất cả"
                                   class="pull-left"></th>
                        <th>SKU</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Create Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><input type="checkbox" name="product[]" value="{{ $product->id }}"></td>
                            <td>{{ $product->SKU }}</td>
                            <td><a href="{{ route('admin.product.edit', $product->id) }}">{{ $product->name }}</a></td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-danger pull-left">Xóa</button>
                {{  $products->links('vendor.pagination.adminlte') }}
            </div>
        </div>
    </form>
@endsection
@section('footer')
@endsection