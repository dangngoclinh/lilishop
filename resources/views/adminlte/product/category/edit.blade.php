@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="btn-group box-menu">
        <a href="{{ route('admin.product.category') }}" class="btn btn-info btn-flat">Danh sách</a>

        <a href="{{ route('admin.product.category.create') }}" class="btn btn-info btn-flat">Thêm
            Kho</a>
    </div>
    <form class="form-horizontal" method="post"
          action="{{ action('Admin\Product\CategoryController@update', $category->id) }}">
        {{ csrf_field() }}
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm Category</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                @include('adminlte.layout.partials.error')
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Tên Tags</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Tên tag"
                               value="{{ $category->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">Slug</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug"
                               value="{{ $category->slug }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="col-sm-2 control-label">Cha</label>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control">
                            <option value="">-- không chọn --</option>
                            @if($categories)
                                @include('adminlte.partials.categoryoption', ['categories' => $categories[0], 'tree' => $categories, 'prefix' => ''])
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                               value="{{ $category->title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Excerpt</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="excerpt" id="excerpt" placeholder="Excerpt"
                               value="{{ $category->excerpt }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="content" id="content"
                                  rows="10">{{ $category->content }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">SEO Keywords</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="seo_keyword" id="seo_keyword"
                               placeholder="SEO Keywords" value="{{ $category->seo_keyword }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="seo_description" class="col-sm-2 control-label">SEO Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="seo_description" id="seo_description"
                                  rows="4">{{ $category->seo_description }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Nhập Lại</button>
                <button type="submit" class="btn btn-info pull-right">Lưu</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </form>
@endsection
@section('footer')
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
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