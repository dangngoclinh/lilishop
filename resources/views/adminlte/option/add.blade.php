@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Option</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal option-add" method="POST" action="{{ action('Admin\OptionController@postAdd') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="key" class="col-sm-2 control-label">Key</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="key" name="key" placeholder="Key" value="{{ old('key') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="value" class="col-sm-2 control-label">Type</label>

                            <div class="col-sm-10">
                                <select class="form-control" name="input">
                                    <option value="input">Input</option>
                                    <option value="textarea">Textarea</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="value" class="col-sm-2 control-label">Mô tả</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        @if(session('success'))
                            <div class="msg">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thành công!</h4>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="msg">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Lỗi!</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-info pull-right">Add</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
/*            $("form").submit(function(event) {
                event.preventDefault();
                $(this).reset();
            })*/
        })
    </script>
@endsection