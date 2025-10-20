@extends('adminlte::page')

@section('title', 'Add New Doctor')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Add New Doctor</h2>

    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Doctor Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter doctor name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Doctor Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter address" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Doctor</button>
    </form>
</div>
@endsection
