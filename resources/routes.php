<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\StatsController;

get('/', function () { return view('welcome'); });

// Authentication routes...
get('auth', ['as' => 'auth.login', 'uses' => AuthController::class . '@getLogin']);
post('auth', ['as' => 'auth.auth', 'uses' => AuthController::class . '@postLogin']);
get('auth/logout', ['as' => 'auth.logout', 'uses' => AuthController::class . '@getLogout']);

// Registration routes...
get('auth/register', ['as' => 'auth.register', 'uses' => AuthController::class . '@getRegister']);
post('auth/register', ['as' => 'auth.create', 'uses' => AuthController::class . '@postRegister']);

get('/home', ReminderController::class.'@show');
post('/reminders', ReminderController::class.'@store');
delete('/reminders/{reminder}', ReminderController::class.'@destroy');

get('/stats', StatsController::class.'@show');

get('/profile', ProfileController::class.'@show');
post('/profile', ProfileController::class.'@update');