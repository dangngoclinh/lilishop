@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <!-- Default box -->
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách tin tức</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox" name="check_all"></th>
                    <th>@lang('Bài viết')</th>
                    <th>@lang('Mục')</th>
                    <th></th>
                    <th class="right">@lang('Ngày tạo')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news_list as $key => $news)
                    @php
                        $url_edit = route('admin.news.edit', (['id' => $news->id]));
                        $url_view = route('news.view', ['slug' => $news->slug, 'id' => $news->id]);
                    @endphp
                    <tr>
                        <td><input type="checkbox" name="news_id[]"></td>
                        <td><a href="{{ $url_edit }}">{{ $news->name }}</a></td>
                        <td>
                            @if($news->categories->isNotEmpty())
                                @foreach($news->categories as $category)
                                    <a href="#">{{ $category->name }}</a>,
                                @endforeach
                            @endif
                        </td>
                        <td class="right">
                            <div class="btn-group hidden-tools">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ $url_view }}" target="_blank">Xem</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="{{ $url_edit }}">Chỉnh sửa</a></li>
                                </ul>
                            </div>
                        </td>
                        <td class="right">{{ $news->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{  $news_list->links('vendor.pagination.adminlte') }}
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection