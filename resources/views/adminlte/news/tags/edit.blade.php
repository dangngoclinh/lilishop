@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('header')
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thêm Tags</h3>

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
              action="{{ action('Admin\News\TagsController@postEdit', ['id' => $tag->id]) }}">
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
                    <label for="name" class="col-sm-2 control-label">Excerpt</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="excerpt" id="excerpt" placeholder="Excerpt"
                               value="{{ $tag->excerpt }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="content" id="content"
                                  rows="10">{{ $tag->content }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">SEO Keywords</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="seo_keyword" id="seo_keyword"
                               placeholder="SEO Keywords" value="{{ $tag->seo_keyword }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="seo_description" class="col-sm-2 control-label">SEO Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="seo_description" id="seo_description"
                                  rows="4">{{ $tag->seo_description }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Nhập Lại</button>
                <button type="submit" class="btn btn-info pull-right">Update</button>
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