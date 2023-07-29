<!-- doctor_page.blade.php -->

@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="display-4">Bonjour, Dr. {{ Auth::user()->name }}</h2>
            <p class="lead">Que voudrais tu faire aujourd'hui?</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-user-plus fa-5x mb-3"></i>
                    <h4 class="card-title">Créer un nouveau patient</h4>
                    <a href="{{ route('patients.create') }}" class="btn btn-primary btn-lg btn-block">Ajouter un patient</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-5x mb-3"></i>
                    <h4 class="card-title">Gérer les patients</h4>
                    <a href="{{ route('patients.index') }}" class="btn btn-secondary btn-lg btn-block">Voir les patients
</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
