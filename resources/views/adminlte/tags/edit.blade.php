@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('header')
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Chỉnh sửa tag')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <form class="form-horizontal" method="post"
              action="{{ action('Admin\TagController@update', ['id' => $tag->id]) }}">
            {{ csrf_field() }}
            <div class="box-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('success') }}
                    </div>
                @endif
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Tên Tags</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" id="slug" value="{{ $tag->slug }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                               value="{{ $tag->title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">@lang('Tóm tắt')</label>
                    <div class="col-sm-10">
                        <textarea name="excerpt" class="form-control" rows="3">{{ $tag->excerpt }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">@lang('Nội dung')</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="content" id="content"
                                  rows="10">{{ $tag->content }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Keywords</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keywords"
                               placeholder="SEO Keywords" value="{{ $tag->keywords }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="seo_description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description"
                                  rows="4">{{ $tag->description }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Nhập lại')</button>
                <button type="submit" class="btn btn-info pull-right">@lang('Lưu')</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
@endsection
@section('footer')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            //editor
            CKEDITOR.replace('content');

            //slug
            $("form").submit(function (event) {
                $("input[name='slug']").val(slug($("input[name='slug']").val()));
            });
        })
    </script>
@endsection