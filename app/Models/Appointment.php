<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'notes',
    ];

    // Use casts instead of the deprecated `$dates` property
    protected $casts = [
        'appointment_date' => 'datetime',
    ];

    /**
     * Get the patient for this appointment.
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get the doctor for this appointment.
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Format appointment date for display (optional convenience accessor).
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->appointment_date
            ? $this->appointment_date->format('d M Y, h:i A')
            : '-';
    }
}
