@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <!-- Default box -->
    <div class="box">
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
                    <th>@lang('ID')</th>
                    <th>@lang('Bài viết')</th>
                    <th>@lang('Ngày tạo')</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($news_list as $key => $news)
                    @php
                        $url_edit = route('admin.news.edit', (['id' => $news->id]));
                        $url_view = route('index.news.view', ['slug' => $news->slug, 'id' => $news->id]);
                    @endphp
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td><a href="{{ $url_edit }}">{{ $news->name }}</a></td>
                        <td>{{ $news->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ $url_edit }}" class="btn btn-danger btn-xs news_delete"><i class="fa fa-pencil"></i></a>
                            <a href="{{ $url_view }}" class="btn btn-success btn-xs" target="_blank"><i
                                        class="fa fa-eye"></i></a>
                        </td>
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