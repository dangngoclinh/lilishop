@extends('adminlte.layout.master')
@section('heading')
    @lang('Quản lý sản phẩm')
@endsection
@section('breadcrumb')
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/bower_dl/semantic-ui-menu/menu.min.css') }}">
@endsection
@section('content')
    @php
        $sizes = $product->sizes;
        $colors = $product->colors;
    @endphp
    @include('adminlte.layout.partials.alert')
    <div class="btn-group box-menu">
        <a href="{{ route('admin.product') }}" class="btn btn-info btn-flat">Danh sách</a>

        <a href="{{ route('admin.product.create') }}" class="btn btn-info btn-flat">Thêm
            Sản Phẩm</a>
    </div>
    <div class="btn-group box-menu">
        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info btn-flat">Thông Tin Sản Phẩm</a>
        <a href="{{ route('admin.product.edit.quantity', $product->id) }}" class="btn btn-info btn-flat">Quản Lý Tồn
            Kho</a>
    </div>
    <form class="form-horizontal" method="post"
          action="{{ action('Admin\Product\UnitController@update', $product->id) }}">
        {{ csrf_field() }}
        <div class="box box-solid ui sticky">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Số lượng chi tiết')</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- End .box-header -->
            <div class="box-body">
                <table class="table table-unit">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Màu</th>
                        <th>Size</th>
                        <th>SKU</th>
                        <th>Tồn kho</th>
                        <th>Giá bán</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($units as $key => $unit)
                        <tr>
                            <td><img src="{{ media($unit->color->image->small) }}" class="img-responsive"
                                               alt=""></td>

                            <td>{{ $unit->color->name }}</td>
                            <td>{{ $unit->size->size->name }}</td>
                            <td><input type="text" class="form-control quantity" name="sku[{{ $unit->id }}]"
                                       value="{{ ($unit->sku != null) ? $unit->sku : $product->SKU }}"{{ ($key==0) ? 'id=sku' : '' }}></td>
                            <td><input type="number" class="form-control quantity" name="quantity[{{ $unit->id }}]"
                                       value="{{ $unit->quantity }}"{{ ($key==0) ? 'id=quantity' : '' }}></td>
                            <td><input type="text" class="form-control price" name="price[{{ $unit->id }}]"
                                       value="{{ $unit->price }}"{{ ($key==0) ? ' id=price' : '' }}></td>
                            <td class="right">
                                <button type="button" class="btn btn-primary btn-sx">@lang('Giống trên')</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End .box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Reset')</button>
                <button type="submit" class="btn btn-primary pull-right">@lang('Save')</button>
            </div>
            <!-- .box-footer -->
        </div>
        <!-- /.box -->
    </form>
@endsection
@section('footer')
    <script type="text/javascript">
        $(function () {
            $('#quantity').on('change', function () {
                $('.quantity').val($(this).val());
            });
            $('#price').on('change', function () {
                $('.price').val($(this).val());
            });
        })
    </script>
@endsection