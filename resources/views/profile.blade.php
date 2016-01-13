@extends('layout')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <h1>{{ $user->name }}</h1>

                <form action="{{ action(\App\Http\Controllers\ProfileController::class.'@update') }}" method="post">

                    {!! csrf_field() !!}

                    <div class="form-group" data-check="name">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" value="{{ old('name', data_get($user, 'name')) }}" class="form-control">
                    </div>

                    <div class="form-group" data-check="email">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', data_get($user, 'email')) }}" class="form-control">
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

                            <button type="submit" class="btn btn-primary btn-block">

                                Update profile
                                <i class="fa fa-fw fa-check"></i>

                            </button>

                        </div>

                    </div>

                </form>
            </div>

            <div class="col-md-4">

                <h2>Notification types</h2>

                <div class="form-group">

                    <label class="control-label">

                        <input type="checkbox" checked> By email

                    </label>

                </div>

                <div class="form-group">

                    <label class="control-label">

                        <input type="checkbox" disabled> By facebook notification

                        <span class=" label label-default">soon</span>

                    </label>

                </div>

                <div class="form-group">

                    <label class="control-label">

                        <input type="checkbox" disabled> By SMS message

                        <span class=" label label-default">soon</span>

                    </label>

                </div>


            </div>

        </div>

    </div>

@stop