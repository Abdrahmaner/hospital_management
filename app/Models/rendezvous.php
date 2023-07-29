<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;

    protected $fillable = ['rdv_id', 'rdv_date', 'patient_id'];

    public function medicalhistory()
    {
        return $this->belongsTo(MedicalHistory::class, 'patient_id');
    }
}
