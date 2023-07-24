<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DoctorAppointmentController extends Controller
{
    public function index()
    {
        $doctorId = Auth::user()->id;
        $appointments = Appointment::where('doctor_id', $doctorId)->get();
        return view('doctor.index', compact('appointments'));
    }

    public function approve(Appointment $appointment)
    {
        $appointment->status = 'approved';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment approved successfully.');
    }

    public function cancel(Appointment $appointment)
    {
        $appointment->status = 'cancelled';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment cancelled successfully.');
    }
}
