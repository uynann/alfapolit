@extends('layouts.auth')

@section('content')
<div id="login-page">
    <div class="login-form">
        <h2>AlfapolitAdmin</h2>
        <form action="{{ url('/login') }}" method="POST">
            {{ csrf_field() }}
            <div class="group">
                <label for="">Email</label>
                <input type="text" placeholder="Your Email Address" name="email" value="{{ old('email') }}" utofocus>
                @if ($errors->has('email'))
                <span class="help-block">
                    <p>{{ $errors->first('email') }}</p>
                </span>
                @endif
            </div>
            <div class="group">
                <label for="">Password</label>
                <input type="password" placeholder="Your Password" name="password">
                @if ($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
                @endif
            </div>
            <div class="group">
                <div class="remember-me">
                    <input type="checkbox" name="remember"> Remember me
                </div>
                <a href="" class="forget-password">Forgot password?</a>
            </div>
            <div class="group">
                <input type="submit" value="login" class="btn">
            </div>
        </form>
    </div>
</div>
@endsection
