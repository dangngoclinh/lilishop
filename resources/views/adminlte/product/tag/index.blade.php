@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách Tags</h3>

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
            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Thành công!</h4>
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th width="5%">
                        <div class="btn-group btn-checkbox cm-check-items">
                            <a href="" data-toggle="dropdown" class="btn dropdown-toggle">
                                <span class="caret pull-right"></span>
                            </a>
                            <input type="checkbox" name="check_all" value="Y" title="Chọn / bỏ chọn tất cả"
                                   class="pull-left cm-check-items ">

                            <ul class="dropdown-menu">
                                <li><a class="cm-on">Tất cả</a></li>
                                <li><a class="cm-off">Không có</a></li>
                                <li><a data-ca-status="a">Hoạt động</a></li>
                                <li><a data-ca-status="d">Vô hiệu</a></li>
                                <li><a data-ca-status="h">Ẩn</a></li>
                            </ul>
                        </div>
                    </th>
                    <th>Tên</th>
                    <th>Slug</th>
                    <th>Ngày Cập Nhật</th>
                    <th></th>
                    <th>Tình trạng</th>
                </tr>
                @foreach($tags as $key => $tag)
                    @php
                        $url_edit = route('admin.product.tag.edit', $tag->id);
                        $url_view = '#';
                        $url_delete = route('admin.product.tag.destroy', $tag->id);
                    @endphp
                    <tr>
                        <td><input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" class="checkbox cm-item  cm-item-status-a user-success"></td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td>{{ $tag->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url(route('admin.product.tag.create')) }}">Thêm tag</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ $url_view }}">Xem</a></li>
                                    <li><a href="{{ $url_edit }}">Chỉ sửa</a></li>
                                    <li><a href="{{ $url_delete }}" class="delete-tag">Xóa</a></li>
                                </ul>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{  $tags->links('vendor.pagination.adminlte') }}
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection