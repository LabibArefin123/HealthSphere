@extends('adminlte::page')

@section('title', 'Add Appointment')

@section('content')
<div class="container py-5" style="max-width: 700px;">
    <h2 class="mb-4 text-primary fw-bold">Add New Appointment</h2>

    <form action="{{ route('appointments.store') }}" method="POST" class="shadow p-4 rounded bg-white">
        @csrf

        <div class="mb-4">
            <label for="patient_id" class="form-label fw-semibold">Select Patient</label>
            <select name="patient_id" id="patient_id" class="form-select" required>
                <option value="" disabled selected>-- Choose Patient --</option>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="doctor_id" class="form-label fw-semibold">Select Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-select" required>
                <option value="" disabled selected>-- Choose Doctor --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="appointment_date" class="form-label fw-semibold">Appointment Date & Time</label>
            <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" 
                   value="{{ old('appointment_date') }}" required>
        </div>

        <div class="mb-4">
            <label for="notes" class="form-label fw-semibold">Notes (optional)</label>
            <textarea name="notes" id="notes" class="form-control" rows="4" placeholder="Additional information...">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100 fw-semibold py-2 fs-5">Save Appointment</button>
    </form>
</div>
@endsection
