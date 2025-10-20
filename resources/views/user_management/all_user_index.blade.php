@extends('adminlte::page')

@section('title', 'All Users')

@section('content')
    <div class="container-fluid"> <!-- Use container-fluid instead of container -->
        <h2 class="mb-3">All Users</h2> <!-- Add margin-bottom to the heading -->

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card"> <!-- Wrap the table in a card to align with AdminLTE's layout -->
            <div class="card-body p-0"> <!-- Remove extra padding -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0"> <!-- Add mb-0 to remove bottom margin -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone 1</th>
                                <th>Phone 2</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Date of Birth</th>
                                <th>National ID</th>
                                <th>Gender</th>
                                <th>Marital Status</th>
                  
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_1 ?? 'Not Provided' }}</td>
                                    <td>{{ $user->phone_2 ?? 'Not Provided' }}</td>
                                    <td>{{ $user->address ?? 'Not Provided' }}</td>
                                    <td>
                                        @if ($user->dob)
                                            {{ \Carbon\Carbon::parse($user->dob)->age }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $user->dob ? date('Y-m-d', strtotime($user->dob)) : 'Not Provided' }}</td>
                                    <td>{{ $user->nid ?? 'Not Provided' }}</td>
                                    <td>{{ ucfirst($user->gender) ?? 'Not Provided' }}</td>
                                    <td>{{ ucfirst($user->marital_status) ?? 'Not Provided' }}</td>
                                  
                                    <td>
                                        <a href="{{ route('all_user_view', $user->id) }}" class="btn btn-info btn-sm me-2">View</a> <!-- Add me-2 -->
                                        <a href="{{ route('user_profile_edit', $user->id) }}" class="btn btn-warning btn-sm me-2">Edit</a> <!-- Add me-2 -->
                                        <form action="{{ route('all_user_delete', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-center mt-3"> <!-- Adjust pagination spacing -->
            {{ $users->links() }}
        </div>
    </div>
@stop
