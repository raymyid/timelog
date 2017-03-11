@extends('layouts.app')

@section('title', trans('auth.login'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('auth.login')</div>
                <div class="panel-body">
                    <form class="px-2" role="form" method="POST" action="{{ route('auth.login') }}">
                        {{ csrf_field() }}
                        <div class="form-group form-group-lg{{ $errors->has('login') ? ' has-error' : '' }}">
                            <label for="login">Email or Username</label>
                            <input class="form-control input-lg" id="login" name="login" value="{{ old('login') }}" type="text" tabindex="1" required autofocus>
                            @if ($errors->has('login'))
                            <span class="help-block">
                                <strong>{{ $errors->first('login') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group form-group-lg{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                            <label for="password" class="control-label pull-right">
                                <a tabindex="5" class="btn btn-link p-0" href="{{ route('auth.password.reset') }}">Forgot Password?</a>
                            </label>
                            <input id="password" type="password" class="form-control input-lg" name="password" tabindex="2" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input tabindex="4" type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">@lang('auth.login')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
