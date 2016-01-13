<?php
namespace App\Console\Tasks;

use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Mail\Message;
use Mail;

class Notify
{
    public function run()
    {
        $today = Carbon::now()->toDateString();

        $reminders = Reminder::where('notify_on', $today)->get();

        /** @var Reminder $reminder */
        foreach($reminders as $reminder) {

            Mail::send('mail.notification', compact('reminder'), function(Message $message) use ($reminder) {

                $message->to($reminder->user->email);

                $message->subject('Reminder for event');

            });

        }
    }
}