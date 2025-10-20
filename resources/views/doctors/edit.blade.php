@extends('adminlte::page')

@section('title', 'Edit Doctor')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Doctor</h2>

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Doctor Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $doctor->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Doctor Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $doctor->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $doctor->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" required>{{ $doctor->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Doctor</button>
    </form>
</div>
@endsection
