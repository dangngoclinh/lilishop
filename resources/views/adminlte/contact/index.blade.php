@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('Liên Hệ')</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox" name="check_all"></th>
                    <th>@lang('Tên')</th>
                    <th>@lang('Email')</th>
                    <th>@lang('Tiêu đề')</th>
                    <th></th>
                    <th class="center">@lang('Ngày gửi')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr{{ ($contact->view)? '' : ' class=no-view' }}>
                        <td><input type="checkbox" name="contact[]"></td>
                        @if($contact->user)
                            <td>{{ $contact->user->name }}</td>
                            <td>{{ $contact->user->email }}</td>
                        @else
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                        @endif
                        <td><a href="{{ route('admin.contact.view', $contact->id) }}">{{ $contact->title }}</a></td>
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
                                        <a href="{{ route('admin.contact.view', $contact->id) }}">@lang('Xem & Trả lời')</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#"
                                           onclick="setRead('{{ $contact->id }}');  return false;">@lang('Đánh dấu đã đọc')</a>
                                    </li>
                                    <li><a href="#"
                                           onclick="setUnRead('{{ $contact->id }}'); return false;">@lang('Đánh dấu chưa đọc')</a>
                                    </li>
                                    <li><a href="http://lilishop2.local/admin/user/destroy/1"
                                           class="delete-tag">@lang('Xóa')</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td class="right">{{ $contact->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            <button type="button" class="btn btn-danger">@lang('Xóa')</button>
            {{  $contacts->links('vendor.pagination.adminlte') }}
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        var url_ajax = '{{ route('admin.contact.ajax') }}';

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function setRead(id) {
            let data = {
                'id': id,
                'act': 'set_read'
            };
            contactAjax(data);
        }

        function setUnRead(id) {
            let data = {
                'id': id,
                'act': 'set_unread'
            };
            contactAjax(data);
        }

        function contactAjax(data) {
            $.post(url_ajax, data, function (result) {
                if (result.status) {
                    location.reload();
                }
            }, 'json')
        }
    </script>
@endsection