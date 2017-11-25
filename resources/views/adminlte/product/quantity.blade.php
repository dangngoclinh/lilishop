@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/bower_dl/semantic-ui-menu/menu.min.css') }}">
@endsection
@section('content')
<form class="form-horizontal" method="post" action="{{ action('Admin\Product\ProductController@store') }}">
    {{ csrf_field() }}
    <div class="box box-solid ui sticky">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Create a product')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- End .box-header -->
        <div class="box-body">
            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">...</div>
                    <div role="tabpanel" class="tab-pane" id="profile">...</div>
                    <div role="tabpanel" class="tab-pane" id="messages">...</div>
                    <div role="tabpanel" class="tab-pane" id="settings">...</div>
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