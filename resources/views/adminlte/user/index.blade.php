@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Users')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
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
                            <input type="checkbox" name="check_all" class="pull-left">
                    </th>
                    <th>@lang('ID')</th>
                    <th>@lang('Name')</th>
                    <th>@lang('Email')</th>
                    <th>@lang('Registered')</th>
                    <th>@lang('Type')</th>
                    <th></th>
                    <th class="right">@lang('Status')</th>
                </tr>
                @foreach($users as $key => $user)
                    @php
                        $url_edit = route('admin.user.edit', $user->id);
                        $url_view = '#';
                        $url_destroy = route('admin.user.destroy', $user->id);
                    @endphp
                    <tr>
                        <td><input type="checkbox" name="tag_ids[]" value="{{ $user->id }}"
                                   class="checkbox cm-item  cm-item-status-a user-success"></td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @php
                                $roles = $user->roles()->get();

                            @endphp
                            @foreach($roles as $role)
                                <span class="label {{ $role->slug }}">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td class="right">
                            <div class="btn-group hidden-tools">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url(route('admin.user.create')) }}">Thêm người dùng</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ $url_view }}">Xem</a></li>
                                    <li><a href="{{ $url_edit }}">Chỉnh sửa</a></li>
                                    <li><a href="{{ $url_destroy }}" class="delete-tag">Xóa</a></li>
                                </ul>
                            </div>
                        </td>
                        <td class="right"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-danger pull-left">@lang('Delete')</button>
            {{  $users->links('vendor.pagination.adminlte') }}
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection