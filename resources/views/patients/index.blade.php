@extends('layouts.default')

@section('content')

<div class="container">
    @if ($notification = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>   
            <strong>{{ $notification }}</strong>
        </div>
    @endif

    <h1 class="h1 text-center">Liste des patients</h1>
    <hr>
  
    <!-- Add the search bar -->
    <div class="mb-3">
        <h3>cherche</h3>
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un patient" style='width:400px'>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="background-color: lightblue;">Nom</th>
                <th style="background-color: lightblue;">Prénom</th>
                <th style="background-color: lightblue;">Adresse</th>
                <th style="background-color: lightblue;">Date de naissance</th>
                <th style="background-color: lightblue;">Téléphone</th>
                <th style="background-color: lightblue;">Assurance</th>
                <th colspan="3" style="text-align:center;background-color:lightblue;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr class="patient-item">
                    <td>{{$patient->nom}}</td>
                    <td>{{$patient->prenom}}</td>
                    <td>{{$patient->adress}}</td>
                    <td>{{$patient->dateNaiss}}</td>
                    <td>{{$patient->telephone}}</td>
                    <td>{{$patient->fournisseur}}</td>
                    <td><a href="medicalhistory/create?patient={{$patient->id}}" class="btn btn-link">Ajouter rdv</a></td>
                    <td>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link">Supprimer</button>
                        </form>
                    </td>
                    <td><a href="{{ route('patients.show', $patient->id) }}" class="btn btn-link">Afficher</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
    <div style="margin-left: 800px">{{ $patients->links() }}</div>

    <div>
        @if(Auth::user()->type_user == 1)
        @else
            <button class="btn btn-warning m-2"><a href="{{route('patients.create')}}">Ajouter un autre patient</a></button>
        @endif
    </div>
</div>

<!-- Add the Bootstrap and custom JavaScript code -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const searchInput = document.getElementById('searchInput');
    const patientItems = document.querySelectorAll('.patient-item');

    searchInput.addEventListener('input', function() {
        const searchQuery = this.value.toLowerCase().trim();

        patientItems.forEach(function(item) {
            const patientName = item.querySelector('td:first-child').textContent.toLowerCase();

            if (patientName.includes(searchQuery)) {
                item.style.display = 'table-row';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>

@endsection
