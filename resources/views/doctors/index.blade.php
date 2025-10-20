@extends('adminlte::page')

@section('title', 'Doctor List')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Doctors</h2>
        <a href="{{ route('doctors.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Doctor
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->address }}</td>
                    <td>
                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No doctors found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
