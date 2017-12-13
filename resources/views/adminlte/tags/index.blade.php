@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header box-broder">
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
                <thead>
                <tr>
                    <th><input type="checkbox" name="check_all"></th>
                    <th>Tên</th>
                    <th>Slug</th>
                    <th></th>
                    <th class="right">Updated</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $key => $tag)
                    @php
                        $url_edit = route('admin.tags.edit', $tag->id);
                        $url_view = route('tag', ['name' => $tag->slug, 'id' => $tag->id]);
                        $url_delete = route('admin.tags.destroy', $tag->id);
                    @endphp
                    <tr>
                        <td><input type="checkbox" name="tags[]"></td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td>
                            <div class="btn-group hidden-tools">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ $url_view }}" target="_blank">Xem</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="{{ $url_edit }}">Chỉnh sửa</a></li>
                                    <li><a href="{{ $url_delete }}" class="act_delete">Xóa</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td class="right">{{ $tag->updated_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="button" class="btn btn-danger pull-left">@lang('Xóa')</button>
            {{  $tags->links('vendor.pagination.adminlte') }}
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection