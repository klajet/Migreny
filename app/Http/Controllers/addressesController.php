<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addresses;

class addressesController extends Controller
{
    public function index(Addresses $editAddress)
    {
        $addresses = addresses::orderBy('id','asc')->paginate(10);
        return view('addresses', compact('addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'road' => 'required',
            'number' => 'required',
            'city' => 'required',
            'cityCode' => 'required',
            'country' => 'required',
        ]);
        
        Addresses::create($request->post());

        return redirect()->route('addresses.index')->with('success','Address has been created successfully!');
    }

    public function edit(Addresses $address)
    {
        return view('addressUpdate',compact('address'));
    }

    public function update(Request $request, Addresses $address)
    {
        $request->validate([
            'road' => 'required',
            'number' => 'required',
            'city' => 'required',
            'cityCode' => 'required',
            'country' => 'required',
        ]);
        
        $address->fill($request->post())->save();

        return redirect()->route('addresses.index')->with('success','Address Has Been updated successfully!');
    }

    public function destroy(Addresses $address)
    {
        $address->delete();
        return redirect()->route('addresses.index')->with('success','Address has been deleted successfully!');
    }
}
