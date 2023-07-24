<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        //
        return view ('admin.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Search patients by name or phone number
        $patients = Patient::where('name', 'like', "%$search%")
            ->orWhere('phonenumber', 'like', "%$search%")
            ->get();

        return view('admin.index', compact('patients'));
    }



    public function delete($id)
    { $patient = Patient::findOrFail($id);

        // Delete the patient
        $patient->delete();
    
        // Delete the corresponding user from the users table
        $user = $patient->user;
        if ($user) {
            $user->delete();
        }
    
        return redirect()->back()->with('success', 'Patient deleted successfully.');
}


}