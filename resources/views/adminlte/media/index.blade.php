@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="grid">
        @foreach($images as $image)
            @php
                $file = url(config('constants.storage_uploads') . $image->file);
                $medium = url(config('constants.storage_uploads') . $image->medium);
                $small = url(config('constants.storage_uploads') . $image->small);
            @endphp
            <div class="grid-item">
                <div class="box box-solid box-media open-media" data-id="{{ $image->id }}">
                    <div class="box-body">
                        <a href="#"><img src="{{ $small }}"
                                         alt="{{ $image->name }}" title="{{ $image->name }}"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">
            {{  $images->links('vendor.pagination.adminlte') }}
        </div>
    </div>
    <div class="modal fade" role="dialog"></div>
@endsection
@section('footer')
    <script type="text/javascript" src="{{ asset('vendor/bower_dl/masonry/dist/masonry.pkgd.min.js') }}"></script>
    <script type="text/javascript">

        jQuery(document).ready(function ($) {

            var $grid = $('.grid').masonry({
                itemSelector: '.grid-item',
                columnWidth: 200,
                gutter: 15
            });

            $(".box-media").click(function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '{{ action('Admin\MediaController@getModalMedia') }}',
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
        })
    </script>
@endsection