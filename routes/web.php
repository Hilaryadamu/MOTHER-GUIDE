<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PregnancyHealthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\RegistereddoctorController;
use App\Http\Controllers\SendreminderController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorAppointmentController;
use App\Http\Controllers\DoctorsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/about', function () {
    return view('about');
});


Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    //customized register page

    Route::get('/patientregister', [RegisteredUserController::class, 'create'])
    
    ->name('adminpatientregister');


Route::post('/patientregister', [RegisteredUserController::class, 'store'])
    
    ->name('userregister');

    //customized patient insert from the doctor

    Route::get('/doctorpatientregister', [RegisteredController::class, 'create'])
    
    ->name('doctorpatientregister');

    Route::post('/doctorpatientregister', [RegisteredController::class, 'store'])
    
    ->name('doctorpatientregister');
 
    

   // customized doctor register page

    Route::get('/doctorregister', [RegistereddoctorController::class, 'create'])
    
    ->name('admindoctorcreate');


Route::post('/admindoctorregister', [RegistereddoctorController::class, 'store'])
    
    ->name('admindoctorregister');


    //patients pages
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    

    Route::get('/patientsappointments', function () {
        return view('patient.appointments.index');
    })->name('appointment');

    Route::get('/patientdoctors', function () {
        return view('patient.doctor.index');
    })->name('doctors');

    //search doctor in patient
   Route::post('/doctorsonsearch', [DoctorsController::class, 'search'])->name('doctorsonsearch');

    
    Route::get('/alerts', function () {
        return view('patient.alert.index');
    })->name('alerts');
    
    Route::post('/send-reminder', [SendreminderController::class, 'sendreminder'])->name('send-reminder');

    // Route::get('/create', function () {
    //     return view('patient.appointments.create');
    // })->name('create');

  //tracks function

    Route::get('/tracks', [PregnancyHealthController::class, 'index'])->name('tracks');
    Route::post('/tracks', [PregnancyHealthController::class, 'checkHealth'])->name('tracks');


     //doctor pages

    Route::get('/appointments',function(){
        return view ('doctor.index');
  })->name('doctorappointments');
       
    
     Route::get('/patients', [SearchController::class, 'index'])->name('patients');
     Route::post('/search-patienton', [SearchController::class, 'search'])->name('search-patienton');
    //  Route::post('/update/{patient}', [SearchController::class, 'update']);
    //  Route::post('/delete/{patient}', [SearchController::class, 'delete']);
      
    //admin pages
    Route::get('/doctorregister',function(){
        return view ('admin.doctorregister');
    })->name('doctorregister');

    //search patient and delete

Route::get('/adminpatients', [PatientController::class, 'index'])->name('adminpatients');  
Route::post('/adminpatients', [PatientController::class, 'search']);
Route::delete('/deletepatient/{id}', [PatientController::class, 'delete'])->name('deletepatient');

   //search doctor
Route::get('/admin', [DoctorController::class, 'index'])->name('admin');

Route::post('/admindoctors', [DoctorController::class, 'search'])->name('search');
Route::delete('/delete/{id}', [DoctorController::class, 'delete'])->name('doctor.delete');

//send sms

Route::post('/scheduled-messages', [SmsController::class, 'store'])->name('scheduled-messages.store');



//appointments


// web.php

// Patient Appointments

// routes/web.php
Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::get('appointments/get-hospitals', [AppointmentController::class, 'getHospitals'])->name('appointments.getHospitals');
Route::get('appointments/get-specializations', [AppointmentController::class, 'getSpecializations'])->name('appointments.getSpecializations');
Route::get('appointments/get-doctors', [AppointmentController::class, 'getDoctors'])->name('appointments.getDoctors');
Route::get('appointments/get-fee', [AppointmentController::class, 'getFee'])->name('appointments.getFee');
Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');


// Route::post('/appointmentsubmit', [AppointmentController::class, 'submitForm'])->name('submit.form');
// Route::post('/fetch/hospitals', [AppointmentController::class, 'fetchHospitals'])->name('fetch.hospitals');
// Route::post('/fetch/specializations', [AppointmentController::class, 'fetchSpecializations'])->name('fetch.specializations');
// Route::post('/fetch/doctors', [AppointmentController::class, 'fetchDoctors'])->name('fetch.doctors');

// Route::get('/appointments/create', [AppointmentController::class, 'create'])
//     ->name('appointments.create');
// Route::post('/fetch-hospitals', [AppointmentController::class, 'fetchHospitals'])->name('fetch-hospitals');
// Route::post('/appointments', [AppointmentController::class, 'store'])
//     ->name('appointments.store');
// Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])
//     ->name('appointments.show');
// Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])
//     ->name('appointments.destroy');

// Doctor Appointments
// Route::get('/doctor/appointments', [DoctorAppointmentController::class, 'index'])
//     ->name('doctor.appointments.index');
// Route::put('/doctor/appointments/{appointment}/approve', [DoctorAppointmentController::class, 'approve'])
//     ->name('doctor.appointments.approve');
// Route::put('/doctor/appointments/{appointment}/cancel', [DoctorAppointmentController::class, 'cancel'])
//     ->name('doctor.appointments.cancel');


   

});

