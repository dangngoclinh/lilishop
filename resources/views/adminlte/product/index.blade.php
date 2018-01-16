@extends('adminlte.layout.master')
@section('heading')
    @lang('Quản lý sản phẩm')
@endsection
@section('breadcrumb')
@endsection
@section('header')
@endsection
@section('content')
    <form action="" method="post">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Quản lý sản phẩm')</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="table_search" class="form-control pull-right"
                               placeholder="Tìm sản phẩm">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover table-products">
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="check_all" value="Y" title="Chọn / bỏ chọn tất cả"
                                   class="pull-left"></th>
                        <th>@lang('Mã (Sku)')</th>
                        <th class="featured"></th>
                        <th>@lang('Tên sản phẩm')</th>
                        <th>@lang('Số lượng')</th>
                        <th></th>
                        <th class="right">@lang('Ngày thêm')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($products->isNotEmpty())
                        @foreach($products as $product)
                            @php
                                $categories = $product->categories;
                                $tags = $product->tags;
                            @endphp
                            <tr>
                                <td><input type="checkbox" name="product[]"
                                           value="{{ $product->id }}"></td>
                                <td>{{ $product->SKU }}</td>
                                <td class="featured">
                                    @if($product->featured)
                                        <img class="img-responsive" src="{{ media($product->featured->small) }}"
                                             alt="{{ $product->featured->name }}">
                                    @else
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.product.edit', $product->id) }}">{{ $product->name }}</a>
                                    <div class="meta">
                                        @if($categories->isNotEmpty())
                                            <div class="categories">
                                                <span>Categories: </span>
                                                @foreach($product->categories as $category)
                                                    <a href="#">{{ $category->name }}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                        @if($tags->isNotEmpty())
                                            <div class="tags">
                                                <span>Tags: </span>
                                                @foreach($product->tags as $tag)
                                                    <a href="#">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $product->quantity }}</td>
                                <td class="center">
                                    <div class="btn-group hidden-tools">
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-expanded="false">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('product', ['slug' => $product->slug, 'id' => $product->id]) }}"
                                                   target="_blank">Xem</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{ route('admin.product.edit', $product->id) }}">@lang('Chỉnh sửa')</a>
                                            </li>
                                            <li><a href="{{ route('admin.product.destroy', $product->id) }}"
                                                   class="delete_direct">@lang('Xóa')</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="right">{{ $product->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="center">
                                Chưa có sản phẩm
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-danger">@lang('Xóa')</button>
                <a class="btn btn-primary" href="{{ route('admin.product.create') }}">@lang('Thêm sản phẩm mới')</a>
                {{  $products->links('vendor.pagination.adminlte') }}
            </div>
        </div>
    </form>
@endsection
@section('footer')
@endsection