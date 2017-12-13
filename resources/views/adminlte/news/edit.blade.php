@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/iCheck/minimal/red.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bower_dl/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bower_dl/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}">
@endsection
@section('content')
    @include('adminlte.layout.partials.error')
    <form name="news_add" class="form-horizontal" method="post"
          action="{{ action('Admin\News\EditController@post', $news->id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="type" value="{{ $news->type }}">
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
                                       value="{{ $news->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Slug</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Tiêu đề"
                                       value="{{ $news->slug }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="col-sm-2 control-label">Tóm tắt</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="excerpt" rows="4">{{ $news->excerpt }}</textarea>
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
                                <textarea class="form-control" name="content" rows="15">{{ $news->content }}</textarea>
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
                                       value="{{ $news->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="seo_keywords" class="col-sm-2 control-label">SEO Keywords</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="seo_keywords" placeholder="SEO Keywords"
                                       value="{{ $news->keywords }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="seo_description" class="col-md-2 control-label">SEo Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="seo_description"
                                          rows="4">{{ $news->description }}</textarea>
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
                        @include('adminlte.news.partials.medialist')
                    </div>
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-footer">
                        <div class="input-group margin">
                            {{--<input type="text" name="newstags" class="form-control">--}}
                            <input type="file" class="form-control" name="file" id="file"/>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info add-media">Upload</button>
                            </span>
                        </div>
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
                        <h3 class="box-title">Category</h3>
                        <div class="box-tools">
                            <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="max-height: 200px; overflow-y: auto">
                        <table class="table table-hover">
{{--                            @include('adminlte.news.partials.category', ['categories' => $categories[0],
                                                                            'tree' => $categories,
                                                                            'category_list' => $category_list,
                                                                             'prefix' => ''])--}}
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
{{--                        @foreach($tags_list as $tags)
                            <span class="tag" data-id="{{ $tags->NewsTags->id }}">{{ $tags->NewsTags->name }}</span>
                        @endforeach--}}

                    </div>
                    <div class="box-footer">
                        <div class="input-group margin">
                            {{--<input type="text" name="newstags" class="form-control">--}}
                            <select class="form-control" name="newstags" id="newstags"></select>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info addnewstags">Thêm</button>
                            </span>
                        </div>
                        <span>@lang('Bạn muốn <a href=":url" target="_blank">thêm tag mới</a> ?', ['url' => route("admin.news.tags.add")])</span>
                    </div>
                </div>
                <div class="box box-solid">
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
                        @if($news->image)
                            <img src="{{ media($news->image->medium) }}" alt="{{ $news->image->name }}" class="img-thumbnail news-image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" role="dialog"></div>
@endsection

@section('footer')
    <script src="//cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/select2/dist/js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/masonry/dist/masonry.pkgd.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var $grid = $('.media-list').masonry({
                itemSelector: '.media-item',
                columnWidth: 200,
                gutter: 15
            });

            //variable
            var news_id = '{{ $news->id }}';
            var token = '{!! csrf_token() !!}';
            var url = {
                'postCategory': '{{ action('Admin\News\EditController@postCategory', $news->id) }}',
                'postTags': '{{ action('Admin\News\EditController@postTags', $news->id) }}',
                'postMedia': '{{ action('Admin\News\EditController@postMedia', $news->id) }}'
            };
            //ckEditor for content
            CKEDITOR.replace('content', {
                extraPlugins: 'image2',
                height: 450
            });

            //update category
            $('.news_category').change(function () {
                var category_id = $(this).val();
                var action = 'delete';
                if ($(this).is(':checked')) {
                    action = 'insert';
                }
                $.ajax({
                    url: url.postCategory,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        '_token': token,
                        'action': action,
                        'category_id': category_id,
                        'news_id': news_id
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
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

            /**
             * Image
             */
            $('button.add-media').click(function () {
                //process
                $('.box-media').addClass('loading');

                var file_data = $('#file').prop('files')[0];
                var action = url.postMedia;
                var method = 'post';
                var formData = new FormData($("#file")[0]);
                formData.append('_token', $('input[name="_token"]').val());
                formData.append('file', file_data);
                $.ajax({
                    url: action,
                    method: method,
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        loadMediaList();
                        $('#file').val(null);
                        $('.box-media').removeClass('loading');
                    },
                    error: function (data) {
                        console.log(data)
                    }
                });
            });

            //open media
            $(document).on('click', '.open-media', function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '{{ action('Admin\News\EditController@openMedia') }}',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                    },
                    success: function (data) {
                        if (data) {
                            // notice that we are expecting a json array with success = true and a payload
                            $('.modal').empty().append(data).modal();
                        } else {
                            // for debugging
                            alert(data);
                        }
                    },
                    error: function (xhr, textStatus, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }


                })
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

            $(document).on('click', '.set-featured', function () {
                var modal = $(this).closest('.modal');
                var image_id = $(this).attr('data-id');
                var action = '{{ action('Admin\News\EditController@setFeatured', $news->id) }}';
                var method = 'post';
                $.ajax({
                    url: action,
                    method: method,
                    data: {
                        _token: $('input[name="_token"]').val(),
                        image_id: image_id
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.success) {
                            $('.news-image').attr('src', result.media);
                            modal.modal('hide');
                        }
                        console.log(result);
                    },
                    error: function (result) {
                        console.log(result);
                    }
                });
            });

            function loadMediaList() {
                var action = '{{ action('Admin\News\EditController@mediaList', $news->id) }}';
                var method = 'post';
                var data = {
                    _token: $('input[name="_token"]').val()
                };
                $.ajax({
                    url: action,
                    method: method,
                    data: data,
                    success: function (result) {
                        $('.box-media .box-body').empty().html(result).masonry('reload');
                        $grid.masonry('layout');
                    },
                    error: function (result) {
                    }
                });
            }
        });

    </script>
@endsection