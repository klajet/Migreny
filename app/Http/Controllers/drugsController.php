<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\drugs;


class drugsController extends Controller
{
    public function index(Drugs $editDrug)
    {
        $drugs = drugs::orderBy('id','asc')->paginate(10);
        return view('drugs', compact('drugs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required',
        ]);
        
        Drugs::create($request->post());

        return redirect()->route('drugs.index')->with('success','Drug has been created successfully!');
    }

    public function edit(Drugs $drug)
    {
        return view('DrugUpdate',compact('drug'));
    }

    public function update(Request $request, Drugs $drug)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required',
        ]);
        
        $drug->fill($request->post())->save();

        return redirect()->route('drugs.index')->with('success','Drug Has Been updated successfully!');
    }

    public function destroy(Drugs $drug)
    {
        $drug->delete();
        return redirect()->route('drugs.index')->with('success','Drug has been deleted successfully!');
    }
}