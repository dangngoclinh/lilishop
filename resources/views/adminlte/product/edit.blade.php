@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')

    @include('adminlte.layout.partials.error')

    <div class="btn-group box-menu">
        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info btn-flat">Thông Tin Sản Phẩm</a>
        {{--<a href="{{ route('admin.product.edit.size', $product->id) }}" class="btn btn-info btn-flat">Hình ảnh</a>--}}
        <a href="{{ route('admin.product.edit.quantity', $product->id) }}" class="btn btn-info btn-flat">Quản Lý Tồn
            Kho</a>
    </div>
    <form id="my-awesome-dropzone" class="form-horizontal dropzone" method="post"
          action="{{ action('Admin\Product\ProductController@update', $product->id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="type" value="{{ $product->type }}">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Tiêu đề</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Tiêu đề"
                                       value="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Slug</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Tiêu đề"
                                       value="{{ $product->slug }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="col-sm-2 control-label">Tóm tắt</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="excerpt"
                                          rows="4">{{ $product->excerpt }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nội Dung</h3>
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
                                          rows="15">{{ $product->content }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">SEO</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="seo_title" class="col-sm-2 control-label">SEO Title</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="seo_title" placeholder="SEO Title"
                                       value="{{ $product->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="seo_keywords" class="col-sm-2 control-label">SEO Keywords</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="seo_keywords" placeholder="SEO Keywords"
                                       value="{{ $product->keywords }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="seo_description" class="col-md-2 control-label">SEo Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="seo_description"
                                          rows="4">{{ $product->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-solid box-media">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hình Ảnh</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('adminlte.product.partials.images', ['images' => $product->images])
                    </div>
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-footer">
                        <input id="file-upload" type="file" name="files[]" multiple="">
                    </div>
                </div>
                <div class="box box-solid box-color">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Color')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('adminlte.product.partials.colors', ['colors' => $product->colors])
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-primary">@lang('Save')</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hành Động</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Ngày xuất bản:</label>
                            <div class="col-md-8">
                                <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                    <input type="text" class="form-control pull-right" id="datepicker">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>
                                    <input type="radio" name="status" class="flat-red">
                                    Hiển Thị
                                </label>&nbsp;&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="status" class="flat-red" checked>
                                    Nháp
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Lưu</button>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Category')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="max-height: 200px; overflow-y: auto">
                        <table class="table table-hover">
                            @include('adminlte.news.partials.category', ['categories' => $categories[0],
                                                                            'tree' => $categories,
                                                                            'category_list' => array_column($product->categories->toArray(), 'id'),
                                                                             'prefix' => ''])
                        </table>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tags</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body box-newstags">
                        @include('adminlte.product.partials.tags', ['tags' => $product->tags])
                    </div>
                    <div class="box-footer">
                        <div class="input-group margin">
                            {{--<input type="text" name="newstags" class="form-control">--}}
                            <select class="form-control" name="product_tags" id="product-tags"></select>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info add-tags">Thêm</button>
                            </span>
                        </div>
                        <span>Bạn muốn <a href="{{ route('admin.news.tags.add') }}"
                                          target="_blank">thêm tag mới</a> ?</span>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Featured Image')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {{--                        @if($news->media)
                                                    <img src="{{ media($news->media->medium) }}" alt="{{ $news->media->name }}" class="img-thumbnail news-image">
                                                @endif--}}
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
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/dropzone/dist/dropzone.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //ckEditor for content
            CKEDITOR.replace('content', {
                extraPlugins: 'image2',
                height: 450
            });

            var $grid = $('.media-list').masonry({
                itemSelector: '.media-item',
                columnWidth: 140,
                gutter: 15
            });

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
                var action = '{{ route('admin.product.edit.postMedia', $product->id) }}';
                formData.append('_token', $('input[name="_token"]').val());
                formData.append('id', '{{ $product->id }}');
                formData.append('type', 'product');
                $.ajax({
                    url: action,
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

            //news tags list
            $('#product-tags').select2({
                theme: "bootstrap",
                ajax: {
                    url: '{{ route('api.product.tags') }}',
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

        });

        //open media
        $(document).on('click', '.open-media', function () {
            $.get($(this).attr('data-url'), function (data) {
                if (data) {
                    $('.modal').empty().append(data).modal();
                } else {
                    // for debugging
                    alert(data);
                }
            })
        });

        //delete
        $(document).on('click', '.image-delete', function (event) {
            event.preventDefault();
            var cf = confirm("Bạn có muốn xóa hình này");
            var md = $(this).closest(".modal");
            if (cf) {
                $.post('{{ route('admin.media.destroy') }}', {id: $(this).attr('data-id')}, function (result) {
                    if (result.status) {
                        md.modal('hide');
                        loadImages();
                        console.log(result);
                    }
                }, 'json')
            }
        });

        $(document).on('click', '.image-set-color', function(event) {
            event.preventDefault();
            var cf = confirm("Bạn có lấy hình ảnh này làm màu");
            var md = $(this).closest(".modal");
            var url = '{{ route('admin.product.edit.add.color', $product->id) }}';
            var data = {
                image_id: $(this).attr('data-id')
            };
            if (cf) {
                $.post(url, data, function (result) {
                    if (result.status) {
                        md.modal('hide');
                        loadColors();
                        console.log(result);
                    }
                }, 'json')
            }
        });


        /*
        $(function () {
            $('#file-upload').on('change', function() {
                var formData = new FormData();
                var action = '{{ route('admin.product.edit.postMedia', $product->id) }}';
                formData.append('_token', $('input[name="_token"]').val());
                formData.append('id', '{{ $product->id }}');
                formData.append('type',  'product');
                formData.append('files', $('input[name="files[]"]').prop('files'));
                $.ajax({
                    url: action,
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data) {
                    }
                });

            });

            function fileUpload($url, $files, $for) {

            };
        });*//*
        $(function () {
            $('#file-upload').on('change', function() {
                var formData = new FormData();
                var action = '{{ route('admin.product.edit.postMedia', $product->id) }}';
                formData.append('_token', $('input[name="_token"]').val());
                formData.append('id', '{{ $product->id }}');
                formData.append('type',  'product');
                formData.append('files', $('input[name="files[]"]').prop('files'));
                $.ajax({
                    url: action,
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data) {
                    }
                });

            });

            function fileUpload($url, $files, $for) {

            };
        });*/
        //end select2
        function loadImages() {
            var action = '{{ route('admin.product.edit.panel.image', $product->id) }}';
            $.get(action, function (result) {
                    $('.box-media .box-body').html(result);
                    $('.media-list').masonry({
                        itemSelector: '.media-item',
                        columnWidth: 140,
                        gutter: 15
                    });
                }
            );
        };

        function loadColors() {
            var action = '{{ route('admin.product.edit.panel.color', $product->id) }}';
            $.get(action, function (result) {
                    $('.box-color .box-body').html(result);
                }
            );
        };

        function colorDelete(product_id, image_id) {
            var url = '{{ route('admin.product.edit.color.delete') }}';
            var data = {
                product_id: product_id,
                image_id: image_id
            };
            $.get(url, data, function(result) {
                if(result.status) {
                    loadColors();
                }
            }, 'json');
        };
    </script>
@endsection