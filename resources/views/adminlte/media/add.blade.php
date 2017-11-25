@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    @include('adminlte.layout.partials.error2')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form class="form-horizontal" action="{{ action('Admin\MediaController@postAdd') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Upload MEDIA</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Chọn FiLE</label>

                    <div class="col-sm-10">
                        <input type="file" name="file" id="file" />
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Nhập Lại</button>
                <button type="submit" class="btn btn-info pull-right">Upload</button>
            </div>
        </div>
    </form>
@endsection