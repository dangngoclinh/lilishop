@extends('adminlte.layout.master')
@section('heading')
    @lang('Quản lý tin tức')
@endsection
@section('breadcrumb')
    <li><a href="{{ route('admin.news')  }}">@lang('Tin tức')</a></li>
    <li class="active">@lang('Thêm')</li>
@endsection
@section('content')
    @include('adminlte.layout.partials.error')
    <form name="news_add" class="form-horizontal" method="post"
          action="{{ action('Admin\News\NewsController@update', $news->id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="type" value="{{ $news->type }}">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Chỉnh sửa bài viết')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">@lang('Tiêu đề')</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="@lang('Tiêu đề')"
                                       value="{{ $news->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">@lang('Slug')</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="@lang('Slug')"
                                       value="{{ $news->slug }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="col-sm-2 control-label">@lang('Tóm tắt')</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="excerpt"
                                          rows="4">{{ $news->excerpt }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Nội dung')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control" name="content"
                                          rows="15">{{ $news->content }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('SEO')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="seo_title" class="col-sm-2 control-label">@lang('Title')</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                       name="title" placeholder="@lang('Title')"
                                       value="{{ $news->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="seo_keywords" class="col-sm-2 control-label">@lang('Keywords')</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keywords"
                                       placeholder="@lang('Keywords')"
                                       value="{{ $news->keywords }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="seo_description" class="col-md-2 control-label">
                                @lang('Description')</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description"
                                          rows="4">{{ $news->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-solid box-media">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Hình ảnh')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('adminlte.news.partials.images', ['images' => $news->images])
                    </div>
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-footer">
                        <input id="file-upload" type="file" name="files[]" multiple="">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Hành động')</h3>
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label left">@lang('Xuất bản:')</label>
                            <div class="col-md-8">
                                <div class="input-group date datetimepicker">
                                    <input type="text" class="form-control pull-right"
                                           name="publish_date"
                                           value="{{ ($news->publish_date) ? $news->publish_date->format('d-m-Y h:i:s') : '' }}">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>
                                    <input type="radio" name="status"
                                           class="flat-red" value="1"{{ ($news->status)? " checked" : "" }}>
                                    @lang('Hiên thị')
                                </label>&nbsp;&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="status"
                                           class="flat-red" value="0"{{ ($news->status)? "" : " checked" }}>
                                    @lang('Ẩn')
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a target="_blank"
                           href="{{ route('news.view', ['id' => $news->id, 'slug' => $news->slug]) }}"
                           class="btn btn-warning">@lang('Xem trước')</a>
                        <button type="submit" class="btn btn-success pull-right">@lang('Lưu')</button>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Danh mục')</h3>
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="max-height: 200px; overflow-y: auto">
                        <table class="table table-hover no-border-top">
                            @php
                                $category_list = $news->categories->pluck('id')->toArray();
                                    $traverse = function ($categories, $prefix = '', $category_list)
                                    use (&$traverse) {
                                        foreach ($categories as $category) {
                                            echo view('adminlte.news.partials.category',
                                                        compact('category', 'prefix', 'category_list'))->render();

                                            $traverse($category->children, $prefix.'¦&nbsp;&nbsp;&nbsp;&nbsp;',
                                                            $category_list);
                                        }
                                    };
                                    $traverse($categories, '', $category_list);
                            @endphp
                        </table>
                    </div>
                </div>
                <div class="box box-solid box-tags">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Tags')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('adminlte.news.partials.tags', ['tags' => $news->tags])
                    </div>
                    <div class="box-footer">
                        <div class="input-group margin">
                            <select class="form-control" name="tags" id="tags"></select>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info add-tags">@lang('Thêm')</button>
                            </span>
                        </div>
                        <span>@lang('Bạn muốn <a href=":url" target="_blank">thêm tag mới</a> ?', ['url' => route("admin.tags.create")])</span>
                    </div>
                </div>
                <div class="box box-solid box-featured">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Ảnh đại diện')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('adminlte.news.partials.featured', ['featured' => $news->featured])
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" role="dialog"></div>
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/iCheck/minimal/red.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bower_dl/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bower_dl/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}">
@endsection
@section('footer')
    <script src="//cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/select2/dist/js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/masonry/dist/masonry.pkgd.min.js') }}"></script>
    <script type="text/javascript">
        //variable
        var url_ajax = '{{ route('admin.news.ajax', $news->id) }}';

        jQuery(document).ready(function ($) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var $grid = $('.media-list').masonry({
                itemSelector: '.media-item',
                columnWidth: 200,
                gutter: 15
            });

            //news tags list
            $('#tags').select2({
                theme: "bootstrap",
                ajax: {
                    url: '{{ route('api.tags.searchSelect2') }}',
                    data: function (params) {
                        let query = {
                            search: params.term
                        };

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    },
                    dataType: 'json',
                    delay: 500,
                    processResults: function (result) {
                        return {
                            results: result
                        }
                    },
                    cache: true
                }
            });

            $(".add-tags").click(function () {
                let tag_id = $('#tags').val();
                addTag(tag_id);
                $('#tags').val(null);
            });
            //ckEditor for content
            CKEDITOR.replace('content', {
                extraPlugins: 'image2',
                height: 450
            });


            //news tags list
            $('#newstags').select2({
                theme: "bootstrap",
                ajax: {
                    url: '{{ route('api.news.tags') }}',
                    dataType: 'json',
                    delay: 500,
                    processResults: function (result) {
                        console.log(result);
                        return {
                            results: result
                        }
                    },
                    cache: true
                }
            });

            /**
             * add news tags
             */
            $('.addnewstags').click(function () {
                var tags_id = $('#newstags').val();
                $.ajax({
                    url: url.postTags,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        '_token': token,
                        'action': 'insert',
                        'tags_id': tags_id,
                        'news_id': news_id
                    },
                    success: function (data) {
                        if (data.status == 'success') {
                            var span = '<span class="tag" data-id="' + data.data.id + '">' + data.data.name + '</span>';
                            $('.box-newstags').append(span);
                        }
                    }
                });
            })

            $('#file-upload').on('change', function () {
                $('.box-media').addClass('loading');

                var files = $('#file-upload')[0].files;
                var formData = new FormData();
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];

                    // Check the file type.
                    if (!file.type.match('image.*')) {
                        continue;
                    }

                    // Add the file to the request.
                    formData.append('photos[]', file);
                }
                formData.append('act', 'upload');
                formData.append('type', 'product');
                $.ajax({
                    url: url_ajax,
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#file-upload').val(null);
                        loadImages();
                        $('.box-media').removeClass('loading');
                        console.log(data);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });

            });

            $(document).on('submit', '#form-modal-media', function (event) {
                event.preventDefault();
                var form = $(this);
                var action = form.attr('action');
                var data = form.serialize();
                var method = 'post';
                $.ajax({
                    url: action,
                    method: method,
                    data: data,
                    dataType: 'json',
                    success: function (data) {
                        if (data.success) {
                            $('.msg').empty().html('Đã Cập Nhật');
                        }
                    },
                    error: function (data) {
                    }
                });
            });

            /**
             * add image to content
             */
            $(document).on('click', '.add-to-content', function () {
                var modal = $(this).closest('.modal');
                modal.modal('hide');
                var form = $(this).closest('form');
                var file = $('input[name="file"]', form).val();
                var name = $('input[name="name"]', form).val();
                var description = $('textarea[name="description"]', form).val();
                var text = '<figure class="image"><img alt="' + name + '" src="' + file + '" width="550" /><figcaption>' + description + '</figcaption></figure>';
                CKEDITOR.instances['content'].insertHtml(text);
            });


        });

        function addCategory(category_id, element) {
            let checked = $(element).is(':checked');
            let data = {
                act: 'add_category',
                checked: checked,
                category_id: category_id
            };
            $.post(url_ajax, data, function (result) {
                console.log(result);
            }, 'text');
        }

        function addTag(tag_id) {
            let data = {
                act: 'add_tag',
                tag_id: tag_id
            };
            $.post(url_ajax, data, function (result) {
                console.log(result);
                loadTag();
            }, 'json');
        }

        function deleteTag(tag_id) {
            let data = {
                act: 'delete_tag',
                tag_id: tag_id
            };
            $.post(url_ajax, data, function (result) {
                console.log(result);
                loadTag();
            }, 'json');
        }

        function loadTag() {
            let data = {
                act: 'load_tag'
            };
            $.post(url_ajax, data, function (result) {
                $(".box-tags .box-body").html(result);
            }, 'text');
        }

        function loadImages() {
            let data = {
                act: 'load_images'
            };
            $.post(url_ajax, data, function (result) {
                    $('.box-media .box-body').html(result);
                    $('.media-list').masonry({
                        itemSelector: '.media-item',
                        columnWidth: 140,
                        gutter: 15
                    });
                }
            );
        }

        function modalImage(image_id) {
            let data = {
                act: 'modal_image',
                image_id: image_id
            };
            $.post(url_ajax, data, function (result) {
                    $('.modal').empty().append(result).modal();
                }
            );
        }

        function imageDelete(image_id) {
            let data = {
                act: 'image_delete',
                image_id: image_id
            };
            $.post(url_ajax, data, function (result) {
                    $('.modal').modal('hide');
                    loadImages();
                }
            );
        }

        function loadFeatured() {
            let data = {
                act: 'load_featured'
            };
            $.post(url_ajax, data, function (result) {
                $('.modal').modal('hide');
                $(".box-featured .box-body").empty().html(result);
            });
        }

        function setFeatured(image_id) {
            let data = {
                act: 'set_featured',
                image_id: image_id
            };
            $.post(url_ajax, data, function (result) {
                    $('.modal').modal('hide');
                    loadFeatured();
                }
            );
        }

    </script>
@endsection