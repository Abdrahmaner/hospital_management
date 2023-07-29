@extends('layouts.default')

@section('content')
<div class="container">
@if ($notification = Session::get('success'))
<div class="alert alert-success alert-block">
   <button type="button" class="close" data-dismiss="alert">×</button>   
        <strong>{{ $notification }}</strong>
</div>
@endif
<p style='text-align:right;'><a href="{{ route('pdf',$patient->id) }}" class='btn btn-success'>Imprimer</a></p>
<h1>Détails du patient</h1>
<table class="table">
<tbody>
<tr>
<th>Nom :</th>
<td>{{ $patient->nom }} {{ $patient->prenom }}</td>
</tr>
<tr>
<th>Adresse :</th>
<td>{{ $patient->adress }}</td>
</tr>
<tr>
<th>Date de naissance :</th>
<td>{{ $patient->dateNaiss }}</td>
</tr>
<tr>
<th>Téléphone :</th>
<td>{{ $patient->telephone }}</td>
</tr>
<tr>
<th>Numéro d'assurance :</th>
<td>{{ $patient->numserie }}</td>
</tr>
<tr>
<th>Assurance :</th>
<td>
@if ($patient->assurance_id)
{{ $patient->fournisseur}}
@else
Aucune information d'assurance disponible
@endif
</td>
</tr>
</tbody>
</table>
    <h2>Historique médical</h2>
    @if ($patient->medicalhistory && $patient->medicalhistory->count() > 0)
        @foreach ($patient->medicalhistory as $medicalhistory)
            <div style="page-break-inside: avoid;">
                <div style="border: 1px solid black; padding: 10px; margin-bottom: 20px;">
                    <h3>Date : {{ $medicalhistory->created_at }}</h3>
                    <p><strong>Diagnostic :</strong> {{ $medicalhistory->diagnosis }}</p>
                    <p><strong>Chirurgie :</strong> {{ $medicalhistory->chirurgie }}</p>
                    <p><strong>Allergie :</strong> {{ $medicalhistory->allergie }}</p>
                    <p><strong>Médication :</strong> {{ $medicalhistory->medicament }}</p>
                    <p><strong>Date du rendez-vous :</strong> {{ $medicalhistory->rendezvous->rdv_date }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Aucun historique médical trouvé pour ce patient.</p>
    @endif

</div>
@endsection