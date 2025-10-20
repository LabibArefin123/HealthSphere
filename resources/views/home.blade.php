@extends('adminlte::page')

@section('title', 'Welcome to HealthRec')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container mx-auto py-5">
        <!-- Page Title -->
        <h1 class="text-3xl font-weight-bold mb-3">Healthcare Record Management System</h1>
        <p class="text-muted fs-5 mb-4">
            Welcome to your central dashboard. Manage patient records, appointments, and medical workflows with ease and efficiency.
        </p>

        <!-- Optional Stats or Intro Section -->
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-user-injured"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Patients</span>
                        <span class="info-box-number">120+</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-calendar-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Appointments</span>
                        <span class="info-box-number">45 Today</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-user-md"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Doctors</span>
                        <span class="info-box-number">12 Available</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
