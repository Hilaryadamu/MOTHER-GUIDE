<?php

namespace App\Models;
use Carbon\Carbon;
use App\Jobs\SendSmsJob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class reminders extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number', 'message', 'reminder_date', 'reminder_time',
    ];

    protected $dates = [
        'reminder_date', 'reminder_time',
    ];
}
