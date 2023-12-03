<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctors;

class doctorsController extends Controller
{
    public function index(Doctors $editDoctor)
    {
        $doctors = doctors::orderBy('id','asc')->paginate(10);
        return view('doctors', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'pesel' => 'required',
            'phone' => 'required',
            'room_id' => 'required',
            'address_id' => 'required', 
        ]);
        
        Doctors::create($request->post());

        return redirect()->route('doctors.index')->with('success','Doctor has been created successfully!');
    }

    public function edit(Doctors $doctor)
    {
        return view('doctorUpdate',compact('doctor'));
    }

    public function update(Request $request, Doctors $doctor)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'pesel' => 'required',
            'phone' => 'required',
            'room_id' => 'required',
            'address_id' => 'required', 
        ]);
        
        $doctor->fill($request->post())->save();

        return redirect()->route('doctors.index')->with('success','Doctor Has Been updated successfully!');
    }

    public function destroy(Doctors $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success','Doctor has been deleted successfully!');
    }
}
