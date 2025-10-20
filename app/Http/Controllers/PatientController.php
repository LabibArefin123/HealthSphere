<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Show all patients
    public function index()
    {
        $patients = Patient::latest()->get();
        return view('patients.index', compact('patients'));
    }

    // Show create form
    public function create()
    {
        return view('patients.create');
    }

    // Store new patient
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:patients,email',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
    }

    // Show edit form
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // Update patient
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:patients,email,' . $patient->id,
            'phone'   => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }
}
