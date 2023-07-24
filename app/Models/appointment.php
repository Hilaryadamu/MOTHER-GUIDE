<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class appointment extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'appointment_date', 'appointment_time', 'message', 
    ];

     


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // protected $table ="appointments";
   

    // protected $fillable =[
    
    //     'AppointmentDate',
    //     'message',
    //     'AppointmentTime',

    // ];

    // public function patients()
    // {
    //     return $this->belongsTo(patients::class, 'patient_id');
    // }

    // public function docctors()
    // {
    //     return $this->belongsTo(doctors::class, 'doctor_id');
    // }


}
