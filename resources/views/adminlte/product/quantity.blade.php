@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/bower_dl/semantic-ui-menu/menu.min.css') }}">
@endsection
@section('content')
    @php
        $sizes = $product->productSizes;
        $colors = $product->colors;
    //dd($sizes->first()->size->name);
    @endphp
    @include('adminlte.layout.partials.alert')
    <div class="btn-group box-menu">
        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info btn-flat">Thông Tin Sản Phẩm</a>
        {{--<a href="{{ route('admin.product.edit.size', $product->id) }}" class="btn btn-info btn-flat">Hình ảnh</a>--}}
        <a href="{{ route('admin.product.edit.quantity', $product->id) }}" class="btn btn-info btn-flat">Quản Lý Tồn
            Kho</a>
    </div>
    <form class="form-horizontal" method="post"
          action="{{ action('Admin\Product\UnitController@storeGeneral', $product->id) }}">
        {{ csrf_field() }}
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Số lượng chung')</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-3 control-label">Số lượng cho mỗi sản phẩm</label>

                        <div class="col-sm-6">
                            <input type="number" name="quantity" class="form-control" placeholder="số lượng">
                        </div>
                    </div>
                    @foreach($sizes as $size)
                        <div class="form-group">
                            <label for="quantity" class="col-sm-3 control-label">Giá bán
                                size: {{ $size->name }}</label>

                            <div class="col-sm-6">
                                <input type="number" name="price[{{ $size->id }}]" class="form-control"
                                       placeholder="Giá" value="{{ old('price')[$size->id] }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Lưu</button>
            </div>
        </div>
    </form>
    <form class="form-horizontal" method="post"
          action="{{ action('Admin\Product\UnitController@store', $product->id) }}">
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
                <div class="box-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($sizes as $key => $size)
                            <li role="presentation"{{ $key == 0 ? 'class=active' : $key }}><a
                                        href="#tab-{{ $size->id }}" role="tab"
                                        data-toggle="tab">&nbsp;&nbsp;Size:&nbsp;&nbsp;{{ $size->size->name }}&nbsp;&nbsp;</a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        @foreach($sizes as $key => $size)
                            <div role="tabpanel" class="tab-pane fade{{ $key == 0 ? ' in active' : $key }}"
                                 id="tab-{{$size->id}}">
                                <div class="row">
                                    @php
                                        $colors = $size->productColors;
                                    @endphp
                                    @foreach($colors as $color)
                                        {{--@php(dd($color))--}}
                                        <div class=" col-sm-4 product-color" style="margin-top: 40px;">
                                            <img src="{{ media($color->image->small) }}" class="img-responsive" alt="">
                                            <div class="input-group">
                                                <span class="input-group-addon">Số lượng</span>
                                                <input type="number" name="quantity[{{ $size->id }}][{{ $color->id }}]"
                                                       class="form-control" value="{{ $color->pivot->quantity }}">
                                            </div>
                                            <div class="input-group border-top-none">
                                                <span class="input-group-addon">Giá bán</span>
                                                <input type="number" name="price[{{ $size->id }}][{{ $color->id }}]"
                                                       class="form-control" value="{{ $color->pivot->price }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
@endsection