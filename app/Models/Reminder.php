<?php
namespace App\Models;

use Eloquent;

/**
 * App\Models\Reminder
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $description
 * @property string $notify_on
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 */
class Reminder extends Eloquent
{
    protected $table = 'reminders';

    protected $fillable = ['starts_on', 'notify_on', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}