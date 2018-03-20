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
                                @if(isset($cmenu) &&  $menu->id == $cmenu->id)
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
    @if(isset($cmenu))
        {{--{{ $cmenu->buildHTML() }}--}}
        <div class="row">
            <div class="col-md-4">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Thêm liên kết')</h3>
                    </div>
                    <!-- /.box-header -->
                    <form method="post" action="">
                        {{ csrf_field() }}
                        <input type="hidden" name="act" value="store_item">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="label">@lang('Label')</label>
                                <input type="text" class="form-control" name="label" placeholder="Label">
                            </div>
                            <div class="form-group">
                                <label for="link">@lang('Link')</label>
                                <input type="text" class="form-control" name="link" placeholder="Link">
                            </div>
                            <div class="form-group">
                                <label for="class">@lang('Class')</label>
                                <input type="text" class="form-control" name="class" placeholder="Class">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">@lang('Lưu')</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (left) -->
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chỉnh sửa</h3>
                    </div>
                    <!-- /.box-header -->
                    <form method="post" action="{{ route('admin.menus.update', ['id' => $cmenu->id]) }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">@lang('Menus')</label>
                                <input type="text" class="form-control" name="name" value="{{ $cmenu->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">@lang('Danh sách menu')</label>
                            </div>
                            <div class="dd nestable" id="nestable">
                                {!! $cmenu->buildHTML() !!}
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">@lang('Lưu')</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (right) -->
        </div>
    @endif
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $("#nestable").nestable({
                maxDepth: 5
            });

            $("#nestable").on('change', function () {
                let url = '{{ action('Admin\MenusController@updateList', ['id' => $cmenu->id]) }}';
                data = {data: $("#nestable").nestable('serialize')};
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        console.log(data);
                    }
                })

            });

            var updateOutput = function (e) {
                alert('lamdang');
                let list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            $(".button-edit").click(function () {
                let url = $(this).attr("data-url");
                $.get(url, function (data) {
                    $("#modal").html(data);
                    $("#modal .modal").modal('toggle');
                })
            });
        });
    </script>
@endsection