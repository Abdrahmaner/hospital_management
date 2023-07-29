<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $table = 'medicalhistories';

    protected $fillable = ['diagnosis', 'chirurgie', 'allergie', 'medicament', 'patient_id'];

    public function rendezvous()
    {
        return $this->hasOne(Rendezvous::class, 'patient_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}

