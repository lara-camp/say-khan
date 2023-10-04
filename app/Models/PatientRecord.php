<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    use HasFactory;
    protected $fillable = ['bodytemp', 'currentsituation', 
    'bloodpressure', 'heartrate', 'remark', 'weight','height', 'medicalimage1','medicalimage2',
    'totalfee','patient_id', 'assistant_id','status'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function assistant()
    {
        return $this->belongsTo(Assistant::class);
    }

}
