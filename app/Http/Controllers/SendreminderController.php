<?php

namespace App\Http\Controllers;
use App\Models\Sms;
use App\Models\reminders;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Jobs\SendSmsJob;
use Illuminate\Support\Facades\Http;

use App\Models\reminders as ModelsReminders;

class SendreminderController extends Controller
{

  



    public function sendReminder(Request $request)
{

    $validatedData = $request->validate([
         'phone_number' => 'required',
        'message' => 'required',
         'reminder_date' => 'required|date',
        'reminder_time' => 'required',
        ]);  
        
        $phoneNumber = $validatedData['phone_number'];
         $message = $validatedData['message'];

        // Save the reminder details to your database if needed
    $reminder = new Reminders();
     $reminder->phone_number = $phoneNumber;
     $reminder->message = $message;
    $reminder->reminder_date = $validatedData['reminder_date'];
    $reminder->reminder_time = $validatedData['reminder_time'];
    $reminder->save();

    $phoneNumber = $_POST['phone_number'];
    $message = $_POST['message'];
    
    $key = 'f1a50703ee9cf8f6';
    $secret = 'ZmY5MjgyYmY2NzZkZTJhMzdiMTMxZGMxNTRiYzI4MGI2OTU5Y2NjZTQ3OWY4ZjRlOTFlZjI5OWFjNDM4MGU4YQ==';
    
    // return ($phone.':'.$msg);
    try { $response = Http::withHeaders([
        'Authorization' => 'Basic ' . base64_encode($key . ':' .$secret ),
    ])->post('https://apisms.beem.africa/v1/send', [
        'source_addr' => 'INFO',
        'encoding' => 0,
        'message' => $message,
        'recipients' => [
            [
                'recipient_id' => '1',
                'dest_addr' => $phoneNumber
            ]
        ]
    ]);


        return redirect()->back()->with('success', 'Reminder sent successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to send reminder check your internet connection ' );
    }
}
}