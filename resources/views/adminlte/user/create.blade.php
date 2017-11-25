@extends('adminlte.layout.master')
@section('breadcrumb')

@endsection
@section('content')
    @include('adminlte.layout.partials.alert')
    <form class="form-horizontal" method="post" action="{{ action('Admin\UserController@store') }}">
        {{ csrf_field() }}
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Create a User')</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">@lang('Name')</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                               autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="col-md-4 control-label">@lang('Phone')</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                               required
                               autofocus>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                        {{ $errors->first('phone') }}
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">@lang('Email address')</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">@lang('Password')</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">@lang('Confirm Password')</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required>
                    </div>
                </div>
                @if($roles)
                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">@lang('Role')</label>

                        <div class="col-md-6">
                            @foreach($roles as $role)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="roles[]"
                                                  value="{{ $role->id }}"
                                                  @if(!empty(old('roles')) && in_array($role->id, old('roles'))) checked @endif>{{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">@lang('Reset')</button>
                <button type="submit" class="btn btn-info pull-right">@lang('Add')</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </form>
@endsection
@section('footer')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $("input[name='name']").keyup(function () {
                $("input[name='slug']").val(slug($("input[name='name']").val()));
            });

            $("form").submit(function (event) {
                $("input[name='slug']").val(slug($("input[name='slug']").val()));
            });
        })
    </script>
@endsection