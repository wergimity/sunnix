@extends('layout')

@section('content')

    <div class="container">

        <div class="col-md-6 col-md-offset-3">

            <h1>Login</h1>

            <form method="POST" action="{{ route('auth.auth') }}">
                {!! csrf_field() !!}

                <div class="form-group" data-check="email">
                    <label class="control-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                </div>

                <div class="form-group" data-check="password">
                    <label class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">Login <i class="fa fa-fw fa-sign-in"></i></button>
                    </div>
                    <div class="col-md-8">
                        <p><a href="#">Remember password</a> or <a href="{{ route('auth.register') }}">Register</a></p>
                    </div>
                </div>
            </form>

        </div>

    </div>

@stop