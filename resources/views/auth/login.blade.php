@extends('layouts.app')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('admin.login.submit') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group has-feedback">
                    <input type="email" id="email" class="form-control" placeholder="Email" name="email"
                           value="{{ old('email') }}" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkbox icheck">
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember
                                    Me</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('password.request') }}">Forgot my password</a><br>
            <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </div>
    </div>
@endsection
