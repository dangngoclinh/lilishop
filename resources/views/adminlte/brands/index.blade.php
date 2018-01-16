@extends('adminlte.layout.master')
@section('heading')
    @lang('Quản lý thương hiệu')
@endsection
@section('breadcrumbs')
    <li class="active">@lang('Thương hiệu')</li>
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Danh sách thương hiệu')</h3>

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
                    <th>@lang('Thương hiệu')</th>
                    <th>@lang('Viết tắt')</th>
                    <th></th>
                    <th class="right">@lang('Ngày thành lập')</th>
                </tr>
                </thead>
                <tbody>
                @if($brands->isNotEmpty())
                    @foreach($brands as $brand)
                        @php
                            $url_edit = route('admin.brands.edit', (['id' => $brand->id]));
                            /*$url_view = route('', ['slug' => $news->slug, 'id' => $news->id]);*/
                        @endphp
                        <tr>
                            <td><input type="checkbox" name="news_id[]"></td>
                            <td><a href="{{ $url_edit }}">{{ $brand->name }}</a></td>
                            <td>{{ $brand->acronym }}</td>
                            <td class="right">
                                <div class="btn-group hidden-tools">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        {{--<li>
                                            <a href="{{ $url_view }}" target="_blank">Xem</a>
                                        </li>--}}
                                        <li class="divider"></li>
                                        <li><a href="{{ $url_edit }}">@lang('Chỉnh sửa')</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td class="right">{{ ($brand->founded_at) ? $brand->founded_at->format('d-m-Y') : '' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="center">@lang('Chưa có bài viết')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-danger">@lang('Xóa')</button>
            <a class="btn btn-primary" href="{{ route('admin.brands.create') }}">@lang('Thêm thương hiệu')</a>
            {{  $brands->links('vendor.pagination.adminlte') }}
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection