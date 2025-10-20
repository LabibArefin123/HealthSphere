@extends('adminlte::page')

@section('title', 'Appointments List')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Appointments</h2>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Appointment
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Appointment Date</th>
                    <th>Notes</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->appointment_date ? $appointment->appointment_date->format('d M Y, h:i A') : '-' }}</td>
                    <td>{{ $appointment->notes ?? '-' }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No appointments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
