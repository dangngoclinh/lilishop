@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Quản lý Menus')</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form method="post" action="{{ action('Admin\MenusController@select') }}">
            {{ csrf_field() }}
            <!-- select -->

                <div class="col-md-2">Chọn menu cần edit</div>
                <div class="col-md-4">
                    <div class="input-group input-group-sm">
                        <select class="form-control" name="menus_id">
                            @foreach($menus as $menu)
                                @if(isset($cmenu) && $cmenu->id == $menu->menus_id)
                                    <option value="{{ $menu->id }}" selected>{{ $menu->name }}</option>
                                @else
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                              <button type="submit" class="btn btn-info btn-flat">Go!</button>
                            </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="#" data-toggle="modal" data-target="#modal-create-menu">Tạo menu mới</a>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <div id="modal-create-menu" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('Thêm Menu')</h4>
                </div>

                <form method="post" action="{{ action('Admin\MenusController@store') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">@lang('Tên menu')</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">@lang('Lưu')</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div id="modal"></div>
@endsection
@section('header')
    <link href="{{ asset('public/plugins/Nestable/style.css') }}" rel="stylesheet"/>
@endsection
@section('footer')
    <script src="{{ asset('public/plugins/Nestable/jquery.nestable.js') }}"></script>
    <script src="{{ asset('public/plugins/Nestable/jquery.nestable++.js') }}"></script>
@endsection