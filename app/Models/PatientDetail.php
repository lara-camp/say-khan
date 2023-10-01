<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientDetail extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'blood_type', 'allergic', 'medical_history'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
