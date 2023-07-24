<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
class DoctorsController extends Controller
{

   
    public function search(Request $request)
    {
        // $search = $request->query('search');
        // where('name', 'like', "%$search%")
        // ->orWhere('phonenumber', 'like', "%$search%")
        // ->get();

        // $doctors = Doctor::when($search, function ($query) use ($search) {
        //     return $query->where('location', 'LIKE', "%$search%")
        //         ->orWhere('specialization', 'LIKE', "%$search%")
        //         ->get();
        // });
        
        $search = $request->input('search');

        // Search patients by name or phone number
        $doctors = Doctor::where('location', 'like', "%$search%")
            ->orWhere('specialization', 'like', "%$search%")
            ->orWhere('hospital', 'like', "%$search%")
            ->get();

        // return view('doctor.patients', compact('patients'));
        return view('patient.doctor.index', compact('doctors', 'search'));
    }
}
