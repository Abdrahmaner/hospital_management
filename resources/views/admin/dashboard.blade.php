@extends('layouts.default')

@section('content')

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="mb-4" style='text-align:center;font-family:serif;font-size:60px'>Admin Dashboard</h1><hr>

                <div class="row">
                    <div class="col-md-4">
                        <div class="section">
                            <h3>Patients</h3>
                            <p>
                            La section des patients vous permet de gérer les dossiers des patients à l'hôpital. Vous pouvez consulter la liste des patients, ajouter de nouveaux patients, mettre à jour les informations des patients et même supprimer des dossiers de patients si nécessaire.                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section">
                            <h3>Docteurs</h3>
                            <p>
                                La section des Médecins vous permet de gérer les informations des médecins. Vous pouvez consulter la liste des médecins, ajouter de nouveaux médecins, mettre à jour les profils des médecins et supprimer les dossiers des médecins au besoin.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section">
                            <h3>Rendez-Vous</h3>
                            <p>
                            Dans la section des Rendez-vous, vous pouvez gérer les rendez-vous des patients. Cela comprend la planification de nouveaux rendez-vous, le report des rendez-vous existants et le suivi des détails des rendez-vous. Vous pouvez également consulter la liste des rendez-vous et gérer leur statut.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Add more sections or features as needed -->
            </div>
        </div>
    </div>
<div class="Emergency_contact">
        <div class="conatiner-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                        <div class="info">
                            <h3>For Any Emergency Contact</h3>
                            <p>Esteem spirit temper too say adieus.</p>
                        </div>
                        <div class="info_button">
                            <a href="{{route('patients.index')}}" class="boxed-btn3-white">affiche les patients</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                        <div class="info">
                            <h3>Make an Online Appointment</h3>
                            <p>Esteem spirit temper too say adieus.</p>
                        </div>
                        <div class="info_button">
                            <a href="{{route('registerdoc')}}" class="boxed-btn3-white">ajouter un nouveau doctor</a>
                        </div>
						<br>
						
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection