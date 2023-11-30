<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctors;

class doctorsController extends Controller
{
    public function index()
    {
        $doctors = doctors::orderBy('id','desc')->paginate(10);
        return view('doctors', compact('doctors'));
    }
}
