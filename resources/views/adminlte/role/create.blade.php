@extends('adminlte.layout.master')
@section('breadcrumb')

@endsection
@section('content')
    <form class="form-horizontal" method="post" action="{{ action('Admin\RoleController@store') }}">
        {{ csrf_field() }}
        @include('adminlte.layout.partials.error')
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Roles')</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- End .box-header -->
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">@lang('Name')</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="@lang('Name role')" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">@lang('Slug')</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" placeholder="@lang('Slug')" value="{{ old('slug') }}">
                    </div>
                </div>
            </div>
            <!-- End .box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Reset')</button>
                <button type="submit" class="btn btn-info pull-right">@lang('Add')</button>
            </div>
            <!-- .box-footer -->
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

            $("form").submit(function (event) {
                $("input[name='slug']").val(slug($("input[name='slug']").val()));
            });
        })
    </script>
@endsection