@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Profil de l'Étudiant</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('student/list') }}">Étudiants</a></li>
                            <li class="breadcrumb-item active">Profil</li>
                        </ul>
                        <div class="col-auto text-end float-end ms-auto download-grp">
                            <a href="{{ route('student/list') }}" class="btn btn-outline-gray me-2"><i class="feather-list"></i></a>
                            <a href="{{ route('student/grid') }}" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                            <a href="{{ route('student/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            <a href="{{ url('student/index/'.$studentProfile->id) }}" class="btn btn-outline-primary me-2"><i class="fas fa-download" ></i> </a>

                        </div>
                    </div>
                </div>
            </div>

            <style>
                @media print {
                    .page-header, .breadcrumb, .download-grp {
                        display: none;
                    }
                    .card {
                        border: none;
                    }
                }
                .card {
                    width: 100%;
                    max-width: 350px;
                    margin: 0 auto;
                    border: 1px solid #ddd;
                    padding: 20px;
                    text-align: center;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                }
                .header img {
                    max-width: 100px;
                }
                .header h2, .header h3 {
                    margin: 10px 0;
                }
                .content p {
                    margin: 5px 0;
                }
                .photo img {
                    max-width: 100px;
                    border-radius: 50%;
                    margin-bottom: 15px;
                }
                .signature .student-signature, .signature .admin-signature {
                    display: inline-block;
                    width: 45%;
                    margin-top: 20px;
                }
                .doc-preview img {
                    max-width: 100px;
                    cursor: pointer;
                }
            </style>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <img src="{{ URL::to('assets/img/log.png') }}" alt="Logo" width="50" height="60">
                                    <h3>ETUDIA</h3>
                                </div>

                                <h4>Carte d'Étudiant</h4>
                            </div>
                            <div class="content">
                                <div class="photo">
                                    <img src="{{ URL::to('images/student-photos/'.$studentProfile->upload ?? 'images/photo_defaults.jpg') }}" alt="Photo d'Étudiant">
                                </div>
                                <p><strong>Nom :</strong> {{ $studentProfile->first_name ?? 'Non renseigné' }}</p>
                                <p><strong>Prénom :</strong> {{ $studentProfile->last_name ?? 'Non renseigné' }}</p>
                                <p><strong>ID Étudiant :</strong> {{ $studentProfile->admission_id ?? 'Non renseigné' }}</p>
                                <p><strong>Date de Naissance :</strong> {{ $studentProfile->date_of_birth ?? 'Non renseigné' }}</p>
                                <p><strong>Classe :</strong> {{ $studentProfile->class ?? 'Non renseigné' }}</p>
                                <p><strong>Année Académique :</strong> 2024 - 2025</p>
                                <p><strong>Adresse :</strong> {{ $studentProfile->roll ?? 'Non renseigné' }}</p>
                                <p><strong>Téléphone :</strong> {{ $studentProfile->phone_number ?? 'Non renseigné' }}</p>
                                <p><strong>Email :</strong> {{ $studentProfile->email ?? 'Non renseigné' }}</p>

                                <!-- Display documents if available -->
                                @if($studentProfile->birth_certificate)
                                    <p><strong>Certificat de Naissance :</strong> <a href="{{ asset('storage/documents/' . $studentProfile->birth_certificate) }}" target="_blank">Voir</a></p>
                                    <p><img src="{{ asset('storage/documents/' . $studentProfile->birth_certificate) }}" class="doc-preview" alt="Certificat de Naissance"></p>
                                @else
                                    <p><strong>Certificat de Naissance :</strong> Non renseigné</p>
                                @endif

                                @if($studentProfile->school_report)
                                    <p><strong>Rapport Scolaire :</strong> <a href="{{ asset('storage/documents/' . $studentProfile->school_report) }}" target="_blank">Voir</a></p>
                                    <p><img src="{{ asset('storage/documents/' . $studentProfile->school_report) }}" class="doc-preview" alt="Rapport Scolaire"></p>
                                @else
                                    <p><strong>Rapport Scolaire :</strong> Non renseigné</p>
                                @endif

                                @if($studentProfile->registration_form)
                                    <p><strong>Formulaire d'Inscription :</strong> <a href="{{ asset('storage/documents/' . $studentProfile->registration_form) }}" target="_blank">Voir</a></p>
                                    <p><img src="{{ asset('storage/documents/' . $studentProfile->registration_form) }}" class="doc-preview" alt="Formulaire d'Inscription"></p>
                                @else
                                    <p><strong>Formulaire d'Inscription :</strong> Non renseigné</p>
                                @endif

                                <p><strong>Date d'Expiration :</strong> {{ $studentProfile->created_at->addYear()->format('d/m/Y') }}</p>
                            </div>
                            <div class="footer">
                                <div class="signature">
                                    <div class="student-signature">Signature de l'Étudiant: ______________________</div>
                                    <div class="admin-signature">Signature de l'Administrateur: ______________________</div>
                                </div>
                                <p>Cette carte doit être présentée lors de tout contrôle ou pour accéder aux services étudiants.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
