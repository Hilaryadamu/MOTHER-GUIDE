<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PregnancyHealthController extends Controller
{
    public function index()
    {
        return view('patient.track.index');
    }

    public function checkHealth(Request $request)
    {
        // Retrieve form inputs
        $bloodPressure = $request->input('blood_pressure');
        $weight = $request->input('weight');
        $pregnantMonth = $request->input('pregnant_month');
        $hasPain = $request->input('has_pain');
        $painType = $request->input('pain_type');

        // Perform health check based on inputs
        $message = '';

        if ($bloodPressure < 121 && $weight < 100 && $pregnantMonth < 10 && $hasPain == 'no') {
            $message = 'Your health is continue in better status.But u need to visit the clinic for more checkup for your unborn baby health and yourself.';
        } 
        
        
        elseif($bloodPressure < 121 && $weight < 100 && $pregnantMonth < 10 && $hasPain == 'yes' && $painType == 'normal' ){
                    
            $message = 'Your health is continue in better status.But u need to visit the clinic for more checkup for your unborn baby health and yourself.';
        }
        
        else {
            $message = 'Your health is not well. It is recommended to visit the hospital.';
        }

        // Return the health check result
        return response()->json(['message' => $message]);
    }

    
}

