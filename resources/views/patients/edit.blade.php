@extends('adminlte::page')

@section('title', 'Edit Patient')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Patient</h2>

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Patient Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $patient->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Patient Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $patient->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $patient->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" required>{{ $patient->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Patient</button>
    </form>
</div>
@endsection
