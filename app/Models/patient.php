<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MedicalHistory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'adress', 'dateNaiss', 'telephone', 'numserie', 'assurance_id'];

    public function medicalhistory()
    {
        return $this->hasOne(Medicalhistory::class, 'patient_id');
        
    }
}
?>