<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .page-title {
            text-align: center;
            color: white;
            background-color: black;
            padding: 10px;
            margin-bottom: 30px;
        }
        .signature {
            text-align: right;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="page-title">l'Histoire Médicale de monsieur {{ $patient->nom }}</h1>

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
                        {{ $patient->fournisseur }}
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
            <div class="mb-5">
                <div class="border p-3">
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

    @if ($notification = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>   
            <strong>{{ $notification }}</strong>
        </div>
    @endif

    <div class="signature">
        <p>Signature: ______________________</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
