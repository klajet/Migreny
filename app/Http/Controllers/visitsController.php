<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visits;

class visitsController extends Controller
{
    public function index(Visits $editVisit)
    {
        $visits = Visits::orderBy('id','asc')->paginate(10);
        return view('visits', compact('visits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'visitDate' => 'required',
            'cost' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'prescription_id' => 'required',
        ]);
        
        Visits::create($request->post());

        return redirect()->route('visits.index')->with('success','Visit has been created successfully!');
    }

    public function edit(Visits $visits)
    {
        return view('visitUpdate',compact('visit'));
    }

    public function update(Request $request, Visits $visit)
    {
        $request->validate([
            'visitDate' => 'required',
            'cost' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'prescription_id' => 'required',
        ]);
        
        $visit->fill($request->post())->save();

        return redirect()->route('visits.index')->with('success','Visit Has Been updated successfully!');
    }

    public function destroy(Visits $visit)
    {
        $visit->delete();
        return redirect()->route('visits.index')->with('success','Visit has been deleted successfully!');
    }
}
