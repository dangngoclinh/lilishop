@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    @include('adminlte.layout.partials.alert')
    <div class="row">
        <div id="context" class="col-sm-8">
            <form action="{{ action('Admin\SizeController@index')  }}" method="post">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Kích thước')</h3>

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
                                <th>
                                    <div class="btn-group btn-checkbox">
                                        <input type="checkbox" name="check_all">
                                    </div>
                                </th>
                                <th>@lang('Name')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sizes as $key => $size)
                                @php
                                    $url_edit = route('admin.size.edit', $size->id);
                                    $url_delete = route('admin.size.destroy', $size->id);
                                @endphp
                                <tr>
                                    <td><input type="checkbox" name="tag_ids[]" value="{{ $size->id }}"
                                               class="checkbox cm-item  cm-item-status-a user-success"></td>
                                    <td>{{ $size->name }}</td>
                                    <td>
                                        <div class="btn-group hidden-tools pull-right">
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-expanded="false">
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ route('admin.size.create') }}">Thêm Role</a></li>
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
                        <button type="submit" class="btn btn-danger">@lang('Xóa')</button>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </form>
        </div>
        <div class="col-sm-4 ui rail">
            @include('adminlte.size.create')
        </div>
    </div>
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/bower_dl/semantic-ui-sticky/sticky.min.css') }}">
@endsection
@section('footer')
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/semantic-ui-sticky/sticky.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.ui.sticky')
                .sticky({
                    context: '#context'
                });
        })
    </script>
@endsection