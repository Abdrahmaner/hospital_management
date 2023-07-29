<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Models\Patient;
use App\Models\Assurance;
use App\Models\Medicalhistory;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = DB::table('patients')
    ->join('assurances', 'patients.assurance_id', '=', 'assurances.id')->select('patients.*', 'assurances.fournisseur')
    ->simplePaginate(6);

        return view('patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assurance= DB::table('assurances')->get();
        return view('patients.create',compact('assurance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    if (Auth::user()->type_user == 0) {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adress' => 'required',
            'telephone' => 'required',
            'dateNaiss' => 'required',
            'numserie' => 'required',
            'assurance_id' => 'required'
        ]);
        $patient = Patient::create($data);
        $patientId = $patient->id;
        // Redirect to the Medical History page with the patient's ID
        return redirect()->route('medicalhistory.create', ['patient' => $patientId])->with('message',
		'le patient a été enregistrer !!');

    }
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

     public function show($id)
     {
         $patient = DB::table('patients')
             ->join('assurances', 'patients.assurance_id', '=', 'assurances.id')
             ->select('patients.*', 'assurances.fournisseur')
             ->where('patients.id', $id)
             ->first();
     
         // Load the medical history for the patient
         $patient->medicalhistory = Medicalhistory::with('rendezvous')->where('patient_id', $id)->get();
         return view('patients.show', compact('patient'));
     }
     public function getpdf($id)
     {
        $patient = DB::table('patients')
             ->join('assurances', 'patients.assurance_id', '=', 'assurances.id')
             ->select('patients.*', 'assurances.fournisseur')
             ->where('patients.id', $id)
             ->first();
     
         // Load the medical history for the patient
         $patient->medicalhistory = Medicalhistory::with('rendezvous')->where('patient_id', $id)->get();
         $pdf = PDF::loadView('patients.pdf', ['patient'=>$patient]);
         return $pdf->stream('pdfpatient.pdf');
         
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
        Patient::destroy($id);
        return redirect('/patients')->with('message', 'Le patient a été supprimé.');

    }
}
