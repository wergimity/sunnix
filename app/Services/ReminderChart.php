<?php
namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use DB;

class ReminderChart
{
    public function forUser(User $user, $year)
    {
        $start = Carbon::createFromDate($year, 1, 1);

        $end = Carbon::createFromDate($year + 1, 1, 1);

        $data = DB::table('reminders')
            ->where('starts_on', '>=', $start->toDateString())
            ->where('starts_on', '<', $end->toDateString())
            ->where('user_id', auth_user()->id)
            ->groupBy('month')
            ->orderBy('month')
            ->get([
                DB::raw('MONTH(starts_on) AS month'),
                DB::raw('COUNT(*) AS count'),
            ]);

        $data = array_pluck($data, 'count', 'month');

        $result = [];

        for($i = 0; $i < 12; $i++) {

            $result[] = (int) data_get($data, $i + 1, 0);

        }

        return $result;
    }
}