<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rooms;

class roomsController extends Controller
{
    public function index(Rooms $editRoom)
    {
        $rooms = Rooms::orderBy('id','asc')->paginate(15);
        return view('rooms', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'floor' => 'required',
            'door' => 'required',
        ]);
        
        Rooms::create($request->post());

        return redirect()->route('rooms.index')->with('success','Room has been created successfully!');
    }

    public function edit(Rooms $room)
    {
        return view('roomUpdate',compact('room'));
    }

    public function update(Request $request, Rooms $room)
    {
        $request->validate([
            'door' => 'required',
            'floor' => 'required',
        ]);
        
        $room->fill($request->post())->save();

        return redirect()->route('rooms.index')->with('success','Room Has Been updated successfully!');
    }

    public function destroy(Rooms $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success','Room has been deleted successfully!');
    }
}
