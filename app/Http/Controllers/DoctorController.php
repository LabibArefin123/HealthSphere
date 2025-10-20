<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:doctors,email',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Doctor::create($request->all());

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully.');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone'   => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $doctor->update($request->all());

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }
}
