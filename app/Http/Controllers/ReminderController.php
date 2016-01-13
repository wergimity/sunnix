<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateReminder;
use App\Models\Reminder;
use App\Services\ReminderDate;
use Carbon\Carbon;

class ReminderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $reminders = auth_user()->reminders()->orderBy('starts_on', 'desc')->paginate(5);

        return view('home', compact('reminders'));
    }

    public function store(CreateReminder $request, ReminderDate $service)
    {
        $date = Carbon::createFromFormat('Y-m-d', $request->get('date'));

        $notify = $service->create($date, $request->get('interval'));

        $data = [
            'starts_on' => $date->format('Y-m-d'),
            'notify_on'  => $notify->format('Y-m-d'),
            'description' => $request->get('description', ''),
        ];
        
        auth_user()->reminders()->create($data);

        return redirect('/home');
    }

    public function destroy($id)
    {
        /** @var Reminder $reminder */
        $reminder = Reminder::find($id);

        if($reminder->user->id != auth_user()->id) {

            return redirect()->action(static::class.'@show');

        }

        $reminder->delete();

        return redirect()->action(static::class.'@show');
    }
}