<?php
namespace App\Services;

use DateInterval;
use DateTime;

class ReminderDate
{
    public function create(DateTime $date, $interval)
    {
        $result = clone $date;

        $direction = substr($interval, 0, 1);

        $interval = new DateInterval('P' . substr($interval, 1));

        if($direction == '+') $result->add($interval);

        if($direction == '-') $result->sub($interval);

        return $result;
    }
}