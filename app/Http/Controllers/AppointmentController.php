<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AppointmentController extends Controller
{    
       
    public function create()
    {
        $locations = Doctor::pluck('location')->unique('');
        $hospitals = collect();
        $specializations = collect();
        $doctors = collect();

        return view('patient.appointments.create', compact('locations', 'hospitals', 'specializations', 'doctors'));
    }

    public function getHospitals(Request $request)
    {
        $hospitals = Doctor::where('location', $request->location)->distinct('')->pluck('hospital');
        return response()->json($hospitals);
    }

    public function getSpecializations(Request $request)
    {
        $specializations = Doctor::where('hospital', $request->hospital)->distinct('')->pluck('specialization');
        return response()->json($specializations);
    }

    public function getDoctors(Request $request)
    {
        $doctors = Doctor::where('specialization', $request->specialization)->distinct('')->pluck('name');
        return response()->json($doctors);
    }



    public function update(Request $request, Appointment $appointment)
{
    // Check if the appointment belongs to the current user (patient) or doctor
    if ($appointment->patient_id !== auth()->user()->user_id && $appointment->doctor_id !== auth()->user()->user_id) {
        return redirect()->route('appointments.index')->with('error', 'You do not have permission to edit this appointment.');
    }

    // Validate the form data
    $validatedData = $request->validate([
        'location' => 'required',
        'hospital' => 'required',
        'specialization' => 'required',
        'doctor' => 'required',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
        'message' => 'required',
        'status' => 'in:approved,cancelled', // Add the status field validation
    ]);

    // Update the appointment
    $appointment->appointment_date = $validatedData['appointment_date'];
    $appointment->appointment_time = $validatedData['appointment_time'];
    $appointment->message = $validatedData['message'];

    // Find the doctor based on the selected options
    $doctor = Doctor::where('location', $validatedData['location'])
        ->where('hospital', $validatedData['hospital'])
        ->where('specialization', $validatedData['specialization'])
        ->where('name', $validatedData['doctor'])
        ->first();

    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor not found.');
    }

    $appointment->doctor_id = $doctor->user_id;

    // Check if the status field is present and update the appointment status
    if ($request->has('status')) {
        $appointment->status = $request->status;
    }

    $appointment->save();

    if (auth()->user()->role_id == 3) {
        return redirect()->route('doctors.appointments')->with('success', 'Appointment updated successfully.');
    } else {
        return redirect()->route('appointments.show', $appointment)->with('success', 'Appointment updated successfully.');
    }
}


public function doctorAppointments()
{
    $doctorAppointments = Appointment::where('doctor_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('doctors.appointments', compact('doctorAppointments'));
}

public function show(Appointment $appointment)
{
    // Check if the appointment belongs to the current user (patient)
    if ($appointment->patient_id !== auth()->user()->user_id) {
        return redirect()->route('appointments.index')->with('error', 'You do not have permission to access this appointment.');
    }

    // Retrieve the doctor details for the appointment
    $doctor = $appointment->doctor;

    return view('appointments.show', compact('appointment', 'doctor'));
}
public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'location' => 'required',
        'hospital' => 'required',
        'specialization' => 'required',
        'doctor' => 'required',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
        'message' => 'required',
    ]);

    // Create the appointment
    $appointment = new Appointment();
    $appointment->appointment_date = $validatedData['appointment_date'];
    $appointment->appointment_time = $validatedData['appointment_time'];
    $appointment->message = $validatedData['message'];
    $appointment->patient_id = auth()->user()->user_id; 
    //                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       id;

    // Find the doctor based on the selected options
    $doctor = Doctor::where('location', $validatedData['location'])
        ->where('hospital', $validatedData['hospital'])
        ->where('specialization', $validatedData['specialization'])
        ->where('name', $validatedData['doctor'])
        ->first();

    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor not found.');
    }

    $appointment->doctor_id = $doctor->id;
    $appointment->save();

    return redirect()->back()->with('success', 'Appointment created successfully.');
}


    }








