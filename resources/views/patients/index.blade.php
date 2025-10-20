@extends('adminlte::page')

@section('title', 'Patient List')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Patient Records</h2>
        <a href="{{ route('patients.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Patient
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patients as $patient)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->address }}</td>
                        <td>
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No patients found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
