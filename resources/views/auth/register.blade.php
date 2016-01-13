@extends('layout')

@section('content')

    <div class="container">

        <div class="col-md-6 col-md-offset-3">

            <h1>Register</h1>

            <form method="POST" action="/auth/register">
                {!! csrf_field() !!}

                <div class="form-group" data-check="name">
                    <label class="control-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>

                <div class="form-group" data-check="email">
                    <label class="control-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                </div>

                <div class="form-group" data-check="password">
                    <label class="control-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group" data-check="password_confirmation">
                    <label class="control-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="row">

                    <div class="col-md-4">

                        <button type="submit" class="btn btn-block btn-primary">
                            Register
                            <i class="fa fa-fw fa-sign-in"></i>
                        </button>

                    </div>

                    <div class="col-md-8">

                        <a href="#">Remember password</a> or <a href="{{ route('auth.login') }}">Login</a>

                    </div>

                </div>
            </form>

        </div>

    </div>

@stop