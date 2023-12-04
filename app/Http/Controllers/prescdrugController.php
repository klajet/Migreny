<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\presc_drugs;

class prescdrugController extends Controller
{
    public function index(Presc_drugs $editPrescdrug)
    {
        $prescdrugs = Presc_drugs::orderBy('id','asc')->paginate(10);
        return view('presc_drugs', compact('prescdrugs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'drug_id' => 'required',
            'presc_id' => 'required',
        ]);
        
        Presc_drugs::create($request->post());

        return redirect()->route('presc_drugs.index')->with('success','Prescdrug has been created successfully!');
    }

    public function edit(Presc_drugs $prescdrug)
    {
        return view('presc_drugsUpdate',compact('prescdrug'));
    }

    public function update(Request $request, Presc_drugs $presc_drug)
    {
        $request->validate([
            'drug_id' => 'required',
            'presc_id' => 'required',
        ]);
        
        $presc_drug->fill($request->post())->save();

        return redirect()->route('presc_drugs.index')->with('success','Prescdrug Has Been updated successfully!');
    }

    public function destroy(Presc_drugs $presc_drug)
    {
        $presc_drug->delete();
        return redirect()->route('presc_drugs.index')->with('success','Prescdrug has been deleted successfully!');
    }
}
