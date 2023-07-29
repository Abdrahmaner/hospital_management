@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Patient Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name:</th>
                    <td>{{ $patient->nom }} {{ $patient->prenom }}</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>{{ $patient->adress }}</td>
                </tr>
                <tr>
                    <th>Date of Birth:</th>
                    <td>{{ $patient->dateNaiss }}</td>
                </tr>
                <tr>
                    <th>Telephone:</th>
                    <td>{{ $patient->telephone }}</td>
                </tr>
                <tr>
                    <th>Insurance Number:</th>
                    <td>{{ $patient->numserie }}</td>
                </tr>
                <tr>
                    <th>Insurance:</th>
                    <td>{{ $patient->assurance->nom }}</td>
                </tr>
            </tbody>
        </table>

        <h2>Medical History</h2>
        @if ($patient->medicalhistory)
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Diagnosis</th>
                        <th>Surgery</th>
                        <th>Allergy</th>
                        <th>Medication</th>
                        <th>Rendezvous Date</th>
                        <th>Rendezvous Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $patient->medicalHistory->date }}</td>
                        <td>{{ $patient->medicalHistory->diagnosis }}</td>
                        <td>{{ $patient->medicalHistory->surgery }}</td>
                        <td>{{ $patient->medicalHistory->allergy }}</td>
                        <td>{{ $patient->medicalHistory->medication }}</td>
                        <td>{{ $patient->medicalHistory->rendezvous->rendezvous_date }}</td>
                        <td>{{ $patient->medicalHistory->rendezvous->rendezvousType->type }}</td>
                    </tr>
                </tbody>
            </table>
        @else
            <p>No medical history found for this patient.</p>
        @endif
    </div>
@endsection
