@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-8">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center my-4" style='color:white;'>{{ __('Enregistrement d\'un Patient') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('patients.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom">
                                    <label for="nom">{{ __('Nom') }}</label>
                                    @error('nom')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="lastname">
                                    <label for="prenom">{{ __('Prénom') }}</label>
                                    @error('prenom')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="address">
                                    <label for="adress">{{ __('Adresse') }}</label>
                                    @error('adress')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control @error('dateNaiss') is-invalid @enderror" name="dateNaiss" required>
                                    <label for="dateNaiss">{{ __('Date de Naissance') }}</label>
                                    @error('dateNaiss')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" required>
                                    <label for="telephone">{{ __('Téléphone') }}</label>
                                    @error('telephone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input id="numserie" type="text" class="form-control @error('numserie') is-invalid @enderror" name="numserie" required>
                                    <label for="numserie">{{ __('Numéro de Série') }}</label>
                                    @error('numserie')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="assurance_id" class="form-select @error('assurance_id') is-invalid @enderror" id="assurance_id">
                                <option value="" selected disabled>{{ __('Sélectionner le Type d\'Assurance') }}</option>
                                @foreach($assurance as $assu)
                                    <option value="{{$assu->id}}">{{$assu->fournisseur}}</option>
                                @endforeach
                            </select>
                            <label for="assurance_id">{{ __('Type d\'Assurance') }}</label>
                            @error('assurance_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary">{{ __('S\'inscrire') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
