<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
     
    protected $fillable = [


       'user_id',
       'location',
        'phonenumber',
        'name',
        'specialization',
        'hospital',
        'role_id',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }


    


}
