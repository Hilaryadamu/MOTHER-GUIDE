<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index(){

        return view('admin.doctors');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $doctors = Doctor::where('name', 'like', '%' . $search . '%')
            ->orWhere('phonenumber', 'like', '%' . $search. '%')
            ->get();

        return view('admin.doctors', compact('doctors'));
    }

    public function delete($id)
    {
        $doctor = Doctor::findOrFail($id);

        //delete doctor
        $doctor->delete();


        // Delete the corresponding user from the users table
        $user = $doctor->user;
        if ($user) {
            $user->delete();
        }
        return view('admin.doctors')->with('success', 'Doctor deleted successfully.');
    }


}
