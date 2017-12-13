@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('Thiết lập website')</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                @if(session('success'))
                    <div class="msg">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Thành công!</h4>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <form class="form-horizontal" method="post" action="{{ action('Admin\OptionController@update') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @foreach($options as $option)
                            <div class="form-group">
                                <label for="{{ $option->key }}" class="col-sm-2 control-label">{{ $option->key }}</label>
                                <div class="col-sm-7">
                                @switch($option->input)
                                    @case('input')
                                        <input type="input" class="form-control" name="value[{{ $option->key }}]" value="{{ $option->value }}">
                                    @break

                                    @case('textarea')
                                        <textarea class="form-control" rows="3" name="value[{{ $option->key }}]">{{ $option->value }}</textarea>
                                    @break
                                @endswitch
                                </div>
                                <div class="col-sm-3">
                                    {{ $option->description }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default">@lang('Nhập lại')</button>
                        <button type="submit" class="btn btn-info pull-right">@lang('Cập nhật')</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection