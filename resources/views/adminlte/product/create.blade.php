@extends('adminlte.layout.master')
@section('heading')
    @lang('Quản lý sản phẩm')
@endsection
@section('breadcrumbs')
    <li><a href="{{ route('admin.product')  }}">@lang('Sản phẩm')</a></li>
    <li class="active">@lang('Thêm sản phẩm')</li>
@endsection
@section('content')
    <form class="form-horizontal" method="post" action="{{ action('Admin\Product\ProductController@store') }}">
        {{ csrf_field() }}
        <div class="box box-solid ui sticky">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Thêm sản phẩm mới')</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- End .box-header -->
            <div class="box-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">@lang('Tên sản phẩm')</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name"
                               value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="help-block ">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- End .box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Nhập lại')</button>
                <button type="submit" class="btn btn-info pull-right">@lang('Thêm')</button>
            </div>
            <!-- .box-footer -->
        </div>
        <!-- /.box -->
    </form>
@endsection
@section('footer')
@endsection