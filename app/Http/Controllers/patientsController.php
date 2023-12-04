<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patients;


class patientsController extends Controller
{
    public function index(Patients $editPatient)
    {
        $patients = patients::orderBy('id','asc')->paginate(15);
        return view('patients', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'pesel' => 'required',
            'email' => 'required',
            'doctor_id' => 'required',
            'address_id' => 'required', 
        ]);
        
        Patients::create($request->post());

        return redirect()->route('patients.index')->with('success','Patient has been created successfully!');
    }

    public function edit(Patients $patient)
    {
        return view('patientUpdate',compact('patient'));
    }

    public function update(Request $request, Patients $patient)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'pesel' => 'required',
            'email' => 'required',
            'doctor_id' => 'required',
            'address_id' => 'required', 
        ]);
        
        $patient->fill($request->post())->save();

        return redirect()->route('patients.index')->with('success','Patient Has Been updated successfully!');
    }

    public function destroy(Patients $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success','Patient has been deleted successfully!');
    }
}
