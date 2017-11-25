@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <form class="form-horizontal" method="post" action="{{ action('Admin\Product\CategoryController@store') }}">
        {{ csrf_field() }}
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm Product Category</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Tên Tags</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Tên tag">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">Slug</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">Vị trí</label>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control">
                            <option value="">- Cấp độ gốc -</option>
                            @if($categories)
                                @include('adminlte.partials.categoryoption', ['categories' => $categories[0], 'tree' => $categories, 'prefix' => ''])
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Nhập Lại</button>
                <button type="submit" class="btn btn-info pull-right">Thêm</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </form>
@endsection
@section('footer')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $("input[name='name']").keyup(function () {
                $("input[name='slug']").val(slug($("input[name='name']").val()));
            });

            $("form").submit(function () {
                $("input[name='slug']").val(slug($("input[name='slug']").val()));
            });
        })
    </script>
@endsection
