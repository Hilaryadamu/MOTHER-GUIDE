<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminpatientsController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $patients = Patient::where('name', 'like', "%{$searchTerm}%")
            ->orWhere('phonenumber', 'like', "%{$searchTerm}%")
            ->get();

        return view('doctor.index', compact('patients'));
    }

    public function delete($id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            $patient->delete();
            // Delete the corresponding user from the users table
            $patient->user()->delete();
            // You may also want to delete related appointments or other related records

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
