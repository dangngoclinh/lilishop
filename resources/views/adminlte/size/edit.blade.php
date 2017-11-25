
@extends('adminlte.layout.master')
@section('breadcrumb')

@endsection
@section('content')
    @include('adminlte.layout.partials.error')
    <form class="form-horizontal" method="post" action="{{ action('Admin\SizeController@update', $size->id) }}">
        {{ csrf_field() }}
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Create a Size for Product')</h3>

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
                        <input type="text" class="form-control" name="name" placeholder="@lang('Name Size')" value="{{ $size->name }}">
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- End .box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Reset')</button>
                <button type="submit" class="btn btn-info pull-right">@lang('Save')</button>
            </div>
            <!-- .box-footer -->
        </div>
        <!-- /.box -->
    </form>
@endsection
@section('footer')
@endsection