<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;
class SearchController extends Controller
{

    public function index()
    {
        return view('doctor.patients');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        // Search patients by name or phone number
        $patients = Patient::where('name', 'like', "%$search%")
            ->orWhere('phonenumber', 'like', "%$search%")
            ->get();

        return view('doctor.patients', compact('patients'));
    }
   

}


