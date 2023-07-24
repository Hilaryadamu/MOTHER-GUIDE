<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // protected $table ="schedules";

    // protected $fillable =[
    
    //     'AppointmentDate',
    //     'message',
    //     'AppointmentTime',

    // ];
   
    

}
