<?php
namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Services\ReminderChart;
use Carbon\Carbon;
use DB;

class StatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(ReminderChart $chart)
    {
        $now = Carbon::now()->toDateString();

        $upcoming = auth_user()->reminders()->where('starts_on', '>', $now)->count();

        $finished = auth_user()->reminders()->where('starts_on', '<', $now)->count();

        $total = auth_user()->reminders()->count();

        $data = $chart->forUser(auth_user(), Carbon::now()->year);

        return view('stats', compact('upcoming', 'finished', 'total', 'data'));
    }
}