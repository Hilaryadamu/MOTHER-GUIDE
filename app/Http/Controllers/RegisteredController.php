<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegisteredController extends Controller
{




     
    public function create()
    {
        return view('doctor.patientregister');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'phonenumber' =>$request->phonenumber ,
             'age' =>$request->age,
             'location'=>$request->location,
             'specialization'=>$request->specialization,
            'hospital'=>$request->hospital,
        ]);

            // Additional logic if needed

            return redirect()->route('patients');
    }
   
  
}
