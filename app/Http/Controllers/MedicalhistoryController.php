<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Medicalhistory;
use App\Models\Rendezvous;
use DB;
use Illuminate\Support\Facades\Redirect;




class MedicalhistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    
     public function create(Request $request)
     {
         $patientId = $request->query('patient');
         $patient = Patient::findOrFail($patientId);
         $patient_id = $patient->id;
         $rdv = DB::table('rendezvoustypes')->get();
         return view('medicalhistory.create', compact('patient_id', 'rdv'));
     }
     
     
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request)
     {
         $data = $request->all();
     
         $patient_id = $request->input('patient_id');
     
         $medicalHistory = MedicalHistory::create([
             'diagnosis' => $data['diagnosis'],
             'chirurgie' => $data['chirurgie'],
             'allergie' => $data['allergie'],
             'medicament' => $data['medicament'],
             'patient_id' => $patient_id,
         ]);
     
         $rendezvous = Rendezvous::create([
             'rdv_date' => $data['rdv_date'],
             'rdv_id' => $data['rdv_id'],
             'patient_id' => $data['patient_id'],
         ]);
     
         $patientId = $request->input('patient_id');
         $patient = Patient::findOrFail($patientId);
     
         // Associate the medical history with the rendezvous
         $rendezvous->medicalhistory()->associate($medicalHistory);
         $rendezvous->save();
     
         return redirect()->route('patients.show', ['patient' => $patient])
             ->with('success', 'L\'histoire médicale et le rendez-vous ont été ajoutés avec succès.');
     }
     
      
     

public function index()
{
    $medicalHistories = Medicalhistory::with('patient', 'rendezvous')->get();
    return view('medicalhistory.index', compact('medicalHistories'));
}

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
