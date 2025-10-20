@extends('adminlte::page')

@section('title', 'User Profile')

@section('content')
    <div class="container">
        <h2>User Profile</h2>
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">User Profile</h4>
            </div>
            <div class="card-body d-flex flex-wrap justify-content-between align-items-start">
                <!-- Profile Details -->
                <div class="flex-fill pe-4">
                    <h5 class="text-secondary mb-3">Basic Information</h5>
        
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                   
                    <h5 class="text-secondary mt-4 mb-3">Contact Info</h5>
                    <p><strong>Phone 1:</strong> {{ $user->phone_1 ?? 'Not Provided' }}</p>
                    <p><strong>Phone 2:</strong> {{ $user->phone_2 ?? 'Not Provided' }}</p>
                    <p><strong>Address:</strong> {{ $user->address ?? 'Not Provided' }}</p>
        
                    <h5 class="text-secondary mt-4 mb-3">Personal Details</h5>
                    <p><strong>Date of Birth:</strong>
                        {{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('Y-m-d') : 'Not Provided' }}
                    </p>
                    <p><strong>Age:</strong>
                        @if($user->dob)
                            {{ \Carbon\Carbon::parse($user->dob)->age }} years
                        @else
                            <span class="badge bg-warning text-dark">Not Provided</span>
                        @endif
                    </p>

                    <p><strong>Gender:</strong> {{ ucfirst($user->gender) ?? 'Not Provided' }}</p>
                    <p><strong>Marital Status:</strong> {{ ucfirst($user->marital_status) ?? 'Not Provided' }}</p>
                   
                </div>
        
                <!-- Profile Picture -->
                <div class="text-center" style="width: 300px;">
                    <img src="{{ $user->getProfilePictureUrl() }}" alt="Profile Picture"
                        class="rounded-circle border border-3 border-primary shadow-sm"
                        style="width: 100%; height: 300px; object-fit: cover;">
        
                    <!-- Form to Edit Profile Picture -->
                    <form action="{{ route('profile_picture_update') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        @method('PUT')
        
                        <div class="form-group">
                            <label for="profile_picture" class="form-label">Change Profile Picture</label>
                            <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success btn-sm mt-2" id="updatePictureBtn">Update Picture</button>
                    </form>
                </div>
            </div>
        </div>
        

        <!-- Password Update Card -->
        <div class="card mt-4">
            <div class="card-header">
                <h4>Change Password</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user_password_update') }}" method="POST" id="updatePasswordForm">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3" id="updatePasswordBtn">Update Password</button>
                </form>
            </div>
        </div>

        <!-- Edit Profile Button -->
        <a href="{{ route('user_profile_edit') }}" class="btn btn-primary mt-3" id="editProfileBtn">Edit Profile</a>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Update Picture Confirmation
        document.getElementById('updatePictureBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent form submission

            Swal.fire({
                title: 'Do you want to update your profile picture?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('updatePictureForm').submit(); // Submit the form if confirmed
                }
            });
        });

        // Update Password Confirmation
        document.getElementById('updatePasswordBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent form submission

            Swal.fire({
                title: 'Do you want to update your password?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('updatePasswordForm').submit(); // Submit the form if confirmed
                }
            });
        });

        // Edit Profile Confirmation
        document.getElementById('editProfileBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default link action

            Swal.fire({
                title: 'Do you want to edit your profile?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, edit it!',
                cancelButtonText: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('user_profile_edit') }}"; // Redirect to edit profile if confirmed
                }
            });
        });
    </script>
@endsection
