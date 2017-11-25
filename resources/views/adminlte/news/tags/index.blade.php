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
            <table class="table table-hover table-bordered">
                <tbody>
                <tr>
                    <th width="5%">id</th>
                    <th>Tên</th>
                    <th>Slug</th>
                    <th>Ngày Cập Nhật</th>
                    <th width="10%"></th>
                </tr>
                @foreach($tags as $key => $tag)
                    @php
                        $url_edit = route('admin.news.tags.edit', $tag->id);
                        $url_view = '#';
                        $url_delete = route('admin.news.tags.delete', $tag->id);
                    @endphp
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td>{{ $tag->updated_at }}</td>
                        <td>
                            <a href="{{ $url_edit }}" class="btn btn-danger btn-xs" data-toggle="tooltip"
                               title="Cập Nhật!"><i class="fa fa-pencil"></i></a>
                            <a href="{{ $url_view }}" class="btn btn-success btn-xs" data-toggle="tooltip" title="Xem!"><i
                                        class="fa fa-eye"></i></a>
                            <a href="{{ $url_delete }}" class="btn btn-danger btn-xs delete_direct"
                               data-toggle="tooltip" title="Xóa!"><i class="fa fa-times"></i></a>
                        </td>
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