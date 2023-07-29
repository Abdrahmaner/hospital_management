@extends('layouts.default')

@section('content')
    <div class="container">
        @if ($notification = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $notification }}</strong>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg mt-8">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center font-weight-light my-4" style='color:white;'>Enregistrer l'Histoire Médicale</h2>
                    </div>
                    <div class="card-body">
                    <h3 style='text-align:center;color:grey;'> La maladie</h3><hr>
                        <form action="{{ route('medicalhistory.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="diagnosis" class="form-label">Diagnostic :</label>
                                        <input type="text" id="diagnosis" name="diagnosis" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="surgery" class="form-label">Chirurgie :</label>
                                        <input type="text" id="surgery" name="chirurgie" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="allergy" class="form-label">Allergie :</label>
                                        <input type="text" id="allergy" name="allergie" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="medication" class="form-label">Médicament :</label>
                                        <input type="text" id="medication" name="medicament" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="patient_id" value="{{ $patient_id }}">
                           <h3 style='text-align:center;color:grey;'> Rendez-vous</h3>
<hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date de rendez-vous :</label>
                                        <input type="date" id="date" name="rdv_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="rdv_id" class="form-label">{{ __('Type de Rendez-vous') }}</label>
                                        <select name="rdv_id" class="form-select" id="rdv_id">
                                            @foreach ($rdv as $rd)
                                                <option value="{{ $rd->id }}">{{ $rd->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Enregistrer l'Histoire Médicale</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
