@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Liên Hệ')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover">
                <tbody>
                @if($contact->user)
                    <tr>
                        <td>@lang('Người gửi')</td>
                        <td><a href="">{{ $contact->user->name }}</a></td>
                    </tr>
                    <tr>
                        <td>@lang('Email')</td>
                        <td>{{ $contact->user->email }}</td>
                    </tr>
                    <tr>
                        <td>@lang('Số điện thoại')</td>
                        <td>{{ $contact->user->phone }}</td>
                    </tr>
                @else
                @endif
                <tr>
                    <td>@lang('Tiêu đề')</td>
                    <td>{{ $contact->title }}</td>
                </tr>
                <tr>
                    <td>@lang('Nội dung')</td>
                    <td>{{ $contact->content }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            <button type="button" class="btn btn-danger">@lang('Xóa')</button>
        </div>
    </div>
@endsection