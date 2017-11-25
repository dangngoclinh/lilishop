@extends('adminlte.layout.master')
@section('breadcrumb')
@endsection
@section('header')
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
@endsection
@section('content')
    {{--    <pre>
            @php
            print_r($user->roles()->get()->pluck('id')->toArray());
            print_r($user->roles()->pluck('id')->toArray())
            @endphp
        </pre>--}}
    @include('adminlte.layout.partials.alert')
    <form class="form-horizontal" method="post"
          action="{{ action('Admin\UserController@update', ['id' => $user->id]) }}">
        {{ csrf_field() }}
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Update a User')</h3>

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
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required
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
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}"
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
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"
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
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">@lang('Confirm Password')</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                @if($roles)
                    <div class="form-group">
                        <label for="roles" class="col-md-4 control-label">@lang('Role')</label>

                        <div class="col-md-6">
                            @php
                                $user_role = $user->roles()->pluck('id')->toArray();
                            @endphp
                            @foreach($roles as $role)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="roles[]"
                                                  value="{{ $role->id }}"
                                                  @if(in_array($role->id, $user_role)) checked @endif>{{ $role->name }}
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
                <button type="submit" class="btn btn-info pull-right">@lang('Save')</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </form>
@endsection
@section('footer')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            //editor
            CKEDITOR.replace('content');

            //slug
            $("form").submit(function (event) {
                $("input[name='slug']").val(slug($("input[name='slug']").val()));
            });
        })
    </script>
@endsection