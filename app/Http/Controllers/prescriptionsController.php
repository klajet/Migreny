<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prescriptions;

class prescriptionsController extends Controller
{
    public function index(Prescriptions $editPrescription)
    {
        $prescriptions = prescriptions::orderBy('id','asc')->paginate(15);
        return view('prescriptions', compact('prescriptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'expires' => 'required',
            'description' => 'required',
        ]);
        
        Prescriptions::create($request->post());

        return redirect()->route('prescriptions.index')->with('success','Prescription has been created successfully!');
    }

    public function edit(Prescriptions $prescription)
    {
        return view('prescriptionUpdate',compact('prescription'));
    }

    public function update(Request $request, Prescriptions $prescription)
    {
        $request->validate([
            'expires' => 'required',
            'description' => 'required',
        ]);
        
        $prescription->fill($request->post())->save();

        return redirect()->route('prescriptions.index')->with('success','Prescription Has Been updated successfully!');
    }

    public function destroy(Prescriptions $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success','Prescriptions has been deleted successfully!');
    }
}
