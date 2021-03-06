@extends('adminlte.layout.master')
@section('heading')
    @lang('Quản lý sản phẩm')
@endsection
@section('breadcrumbs')
    <li><a href="{{ route('admin.product')  }}">@lang('Sản phẩm')</a></li>
    <li class="active">@lang('Chỉnh sửa sản phẩm')</li>
@endsection
@section('content')
    <div class="btn-group box-menu">
        <a href="{{ route('admin.product') }}" class="btn btn-info btn-flat">Danh sách</a>

        <a href="{{ route('admin.product.create') }}" class="btn btn-info btn-flat">Thêm
            Sản Phẩm</a>
    </div>
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
                            <label for="name" class="col-sm-3 control-label">ID Sản Phẩm</label>

                            <div class="col-sm-9">
                                <strong>{{ $product->id }}</strong>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Tiêu đề</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Tiêu đề"
                                       value="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Slug</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug"
                                       value="{{ $product->slug }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">SKU</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="SKU"
                                       value="{{ $product->SKU }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">@lang('Thương hiệu')</label>

                            <div class="col-sm-9">
                                <select class="form-control" name="brands" id="brands">
                                    @if($product->brand)
                                        <option value="{{ $product->brand->id }}">
                                            {{ $product->brand->name }} </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="col-sm-3 control-label">Tóm tắt</label>

                            <div class="col-sm-9">
                                <textarea class="form-control" name="excerpt"
                                          rows="4">{{ $product->excerpt }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="col-sm-3 control-label">Giá</label>

                            <div class="col-sm-9">
                                <input class="form-control" name="price"
                                       rows="4" value="{{ $product->price }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="col-sm-3 control-label">@lang('Giá khuyến mãi')</label>

                            <div class="col-sm-9">
                                <input class="form-control" name="discount_price"
                                       value="{{ $product->discount_price }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="col-sm-3 control-label">@lang('Ngày kết thúc')</label>

                            <div class="col-sm-9">
                                <div class="input-group date datepicker">
                                    <input type="text" class="form-control pull-right"
                                           name="discount_end"
                                           value="">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Thông tin chi tiết sản phẩm')</h3>
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
                            <label for="seo_title" class="col-sm-2 control-label">Title</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="SEO Title"
                                       value="{{ $product->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="seo_keywords" class="col-sm-2 control-label">Keywords</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keywords" placeholder="SEO Keywords"
                                       value="{{ $product->keywords }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="seo_description" class="col-md-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description"
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
                        <h3 class="box-title">@lang('Màu sắc')</h3>
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
                </div>
                <div class="box box-solid box-sizes">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Kích thước')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('adminlte.product.partials.sizes', ['sizes' => $product->sizes])
                    </div>
                    <div class="box-footer">
                        <div class="input-group input-group-sm">
                            <select id="product-sizes" name="product_sizes" class="form-control"></select>
                            <span class="input-group-btn">
                                <button type="button"
                                        class="btn btn-info btn-flat size-add">@lang('Thêm kích thước')</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End box-color -->

            <div class="col-md-4">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('Hành động')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
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
                                           name="published_at"
                                           value="{{ ($product->published_at) ? $product->published_at->format('d-m-Y h:i:s') : '' }}">
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
                                           class="flat-red" value="1"{{ ($product->status)? " checked" : "" }}>
                                    @lang('Hiên thị')
                                </label>&nbsp;&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="status"
                                           class="flat-red" value="0"{{ ($product->status)? "" : " checked" }}>
                                    @lang('Ẩn')
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
                        <h3 class="box-title">@lang('Danh mục')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="max-height: 200px; overflow-y: auto">
                        <table class="table table-hover">
                            @php
                                $category_list = $product->categories->pluck('id')->toArray();
                                    $traverse = function ($categories, $prefix = '', $category_list)
                                    use (&$traverse) {
                                        foreach ($categories as $category) {
                                            echo view('adminlte.product.partials.category',
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
                        <h3 class="box-title">@lang('Nhãn')</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('adminlte.product.partials.tags', ['tags' => $product->tags])
                    </div>
                    <div class="box-footer">
                        <div class="input-group margin">
                            <select class="form-control" name="product_tags" id="tags"></select>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info add-tags">Thêm</button>
                            </span>
                        </div>
                        <span>@lang('Bạn muốn <a href=":url"
                                          target="_blank">thêm tag mới</a>?',
                                          ['url' => route('admin.tags.create') ])</span>
                    </div>
                </div>
                <div class="box box-solid box-featured">
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
                        @include('adminlte.product.partials.featured', ['featured' => $product->featured])
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
    <script type="text/javascript"
            src="{{ asset('vendor/bower_dl/bootstrap3-typeahead/bootstrap3-typeahead.js') }}"></script>
    <script type="text/javascript">
        //variable
        var url_ajax = '{{ route('admin.product.edit.ajax', $product->id) }}';

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

            //news tags list
            $('#product-sizes').select2({
                theme: "bootstrap",
                ajax: {
                    url: '{{ route('api.sizes.searchSelect2') }}',
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

            //news tags list
            $('#brands').select2({
                theme: "bootstrap",
                ajax: {
                    url: '{{ route('api.brands.searchSelect2') }}',
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

            $.get("{{ route('api.colors.searchSelect2') }}", function (data) {
                $(".typeahead").typeahead({source: data});
            }, 'json');

            $(".add-tags").click(function () {
                let tag_id = $('#tags').val();
                addTag(tag_id);
                $('#tags').val(null);
            });

            $(document).on('click', '.image-set-color', function (event) {
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

            $(document).on('focusout', '.color-name', function () {
                alert('lamdang');
                var url = '{{ route('admin.product.edit.color.name', $product->id) }}';
                var color_id = $(this).attr('data-id');
                var data = {
                    color_id: color_id,
                    name: $(this).val()
                };
                $.post(url, data, function (result) {
                })
            });

            //size delete
            $(document).on('click', '.size-add', function (event) {
                event.preventDefault();
                var size = $("#product-sizes").val();
                sizeAdd(size, sizeLoad);
                $("#product-sizes").val('');
            });
        });

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
        }

        function loadColors() {
            var action = '{{ route('admin.product.edit.panel.color', $product->id) }}';
            $.get(action, function (result) {
                    $('.box-color .box-body').html(result);
                }
            );
        }

        function colorDelete(image_id) {
            var url = '{{ route('admin.product.edit.color.delete', $product->id) }}';
            var data = {
                image_id: image_id
            };
            $.post(url, data, function (result) {
                if (result.status) {
                    loadColors();
                }
            }, 'json');
        }


        function sizeLoad() {
            var action = '{{ route('admin.product.edit.size.load', $product->id) }}';
            $.get(action, function (result) {
                    $('.box-sizes .box-body').html(result);
                }
            );
        }

        function sizeAdd(size_id, callback) {
            var data = {
                act: 'size_add',
                size_id: size_id
            };
            $.post(url_ajax, data, function (result) {
                if (result.status) {
                    callback();
                }
            });
        }

        function siteDelete(size_id, callback) {
            let data = {
                act: 'size_delete',
                size_id: size_id
            };
            $.post(url_ajax, data, function (result) {
                if (result.status) {
                    callback();
                }
            });
        }

        function setFeatured(image_id, callback, callback2 = null) {
            let data = {
                act: 'set_featured',
                image_id: image_id
            };
            $.post(url_ajax, data, function (result) {
                if (result.status) {
                    callback();
                    if (callback2) {
                        callback2();
                    }
                }
            });
        }

        function loadFeatured() {
            let data = {
                act: 'load_featured'
            };
            $.post(url_ajax, data, function (result) {
                $('.box-featured .box-body').html(result);
            }, 'text');
        }

        function modalClose() {
            $('.modal').modal('hide');
        }

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
            });
        }
    </script>
@endsection