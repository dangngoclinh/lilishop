@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    @include('adminlte.layout.partials.alert')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Roles')</h3>

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
                    <th width="5%">
                        <div class="btn-group btn-checkbox">
                            <input type="checkbox" name="check_all">
                        </div>
                    </th>
                    <th>@lang('Name')</th>
                    <th>@lang('Slug')</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $key => $role)
                    @php
                        $url_edit = route('admin.role.edit', $role->id);
                        $url_delete = route('admin.role.destroy', $role->id);
                    @endphp
                    <tr>
                        <td><input type="checkbox" name="tag_ids[]" value="{{ $role->id }}"
                                   class="checkbox cm-item  cm-item-status-a user-success"></td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        <td>
                            <div class="btn-group hidden-tools pull-right">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url(route('admin.role.create')) }}">Thêm Role</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ $url_edit }}">Chỉnh sửa</a></li>
                                    <li><a href="{{ $url_delete }}" class="delete-tag">Xóa</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="#" class="btn btn-danger">Xóa</a>
            <a href="{{ route('admin.role.create') }}" class="btn btn-success pull-right">Thêm Role</a>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection