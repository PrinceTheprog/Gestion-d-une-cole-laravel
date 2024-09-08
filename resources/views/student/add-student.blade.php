@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Ajouter un Etudiant</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/add/page') }}">Etudiant</a></li>
                                <li class="breadcrumb-item active">Ajouter un Etudiant</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('student/add/saves') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info"> Information de l'étudiant
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <!-- Existing fields here -->
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom de famille <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="Entrez le nom de famille" value="{{ old('first_name') }}">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Prénoms <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Entrez le prénom" value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Sexe <span class="login-danger">*</span></label>
                                            <select class="form-control select  @error('gender') is-invalid @enderror" name="gender">
                                                <option selected disabled>Selectionner son sexe</option>
                                                <option value="Femme" {{ old('gender') == 'Female' ? "selected" :"Female"}}>Femme</option>
                                                <option value="Homme" {{ old('gender') == 'Male' ? "selected" :""}}>Homme</option>
                                                <option value="Autres" {{ old('gender') == 'Others' ? "selected" :""}}>Autres</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Date de naissance<span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text" placeholder="DD-MM-YYYY" value="{{ old('date_of_birth') }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Addresse </label>
                                            <input class="form-control @error('roll') is-invalid @enderror" type="text" name="roll" placeholder="Entrez votre Addresse" value="{{ old('roll') }}">
                                            @error('roll')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="form-title student-info"> Autres information de l'étudiant
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Groupe sanguin <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('blood_group') is-invalid @enderror" name="blood_group">
                                                <option selected disabled>Sélectionner un groupe sanguin</option>
                                                <option value="A+" {{ old('blood_group') == 'A+' ? "selected" :""}}>A+</option>
                               
                                                <option value="B+" {{ old('blood_group') == 'B+' ? "selected" :""}}>B+</option>
                                                <option value="O+" {{ old('blood_group') == 'O+' ? "selected" :""}}>O+</option>
                                            </select>
                                            @error('blood_group')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Religion <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('religion') is-invalid @enderror" name="religion">
                                                <option selected disabled>Selectionner une religion </option>
                                                <option value="Chrétien" {{ old('religion') == 'Chrétien' ? "selected" :""}}>Chrétien</option>
                                                <option value="Musulman" {{ old('religion') == 'Musulman' ? "selected" :""}}>Musulman</option>
                                                <option value="Autres" {{ old('religion') == 'Autres' ? "selected" :""}}>Autres</option>
                                            </select>
                                            @error('religion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>E-Mail <span class="login-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Entrez l'Email " value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Classe <span class="login-danger">*</span></label>
                                            <select id="class-select" class="form-control @error('class') is-invalid @enderror" name="class">
                                                <option selected disabled> Classe </option>
                                                <option value="6 ème" {{ old('class') == '6 ème' ? "selected" :""}}>6 ème</option>
                                                <option value="5 ème" {{ old('class') == '5 ème' ? "selected" :""}}>5 ème</option>
                                                <option value="4 ème" {{ old('class') == '4 ème' ? "selected" :""}}>4 ème</option>
                                                <option value="3 ème" {{ old('class') == '3 ème' ? "selected" :""}}>3 ème</option>
                                                <option value="Seconde" {{ old('class') == 'Seconde' ? "selected" :""}}>Seconde </option>
                                                <option value="Première" {{ old('class') == 'Première' ? "selected" :""}}>Première </option>
                                                <option value="Terminale" {{ old('class') == 'Terminale' ? "selected" :""}}>Terminale</option>
                                                <!-- Ajoutez d'autres options de classe ici -->
                                            </select>
                                            @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Section <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('section') is-invalid @enderror" name="section">
                                                <option selected disabled>Selectionner une Section </option>
                                                <option value="A" {{ old('section') == 'A' ? "selected" :""}}>A</option>
                                                <option value="B" {{ old('section') == 'B' ? "selected" :""}}>B</option>
                                                <option value="C" {{ old('section') == 'C' ? "selected" :""}}>C</option>
                                            </select>
                                            @error('section')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Identifiant d'admission </label>
                                            <input id="admission_id" class="form-control @error('admission_id') is-invalid @enderror" type="text" name="admission_id" readonly value="{{ old('admission_id') }}">
                                            @error('admission_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const classSelect = document.getElementById('class-select');
                                            const admissionIdField = document.getElementById('admission_id');
                                    
                                            classSelect.addEventListener('change', function() {
                                                const selectedClass = classSelect.value;
                                    
                                                if (selectedClass) {
                                                    // Générer l'ID d'admission basé sur la classe choisie
                                                    const admissionId = 'CLS' + selectedClass + '-' + Math.random().toString(36).substr(2, 6).toUpperCase();
                                                    admissionIdField.value = admissionId;
                                                } else {
                                                    admissionIdField.value = ''; // Réinitialiser l'ID si aucune classe n'est sélectionnée
                                                }
                                            });
                                        });
                                    </script>
                                                                        
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Télephone </label>
                                            <input class="form-control @error('phone_number') is-invalid @enderror" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" name="phone_number" placeholder="Entrez votre numéro" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label for="upload" class="form-label">Téléverser une photo (150px X 150px)</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control @error('upload') is-invalid @enderror" id="upload" name="upload" aria-describedby="uploadHelp">
                                            </div>
                                            @error('upload')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- Add new fields here -->
                                    <div class="col-12">
                                        <h5 class="form-title student-info"> Informations complémentaires
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom du parent <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('parent_name') is-invalid @enderror" name="parent_name" placeholder="Entrez le nom du parent" value="{{ old('parent_name') }}">
                                            @error('parent_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                                                            <!-- Add new fields here -->
                                                                            <div class="col-12 col-sm-4">
                                                                                <div class="form-group local-forms">
                                                                                    <label>Profession du parent <span class="login-danger">*</span></label>
                                                                                    <input type="text" class="form-control @error('parent_profession') is-invalid @enderror" name="parent_profession" placeholder="Entrez la profession du parent" value="{{ old('parent_profession') }}">
                                                                                    @error('parent_profession')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>Champs obligatoire</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                        
                                                                            <div class="col-12 col-sm-4">
                                                                                <div class="form-group local-forms">
                                                                                    <label>Nom de l'école précédente <span class="login-danger">*</span></label>
                                                                                    <input type="text" class="form-control @error('previous_school_name') is-invalid @enderror" name="previous_school_name" placeholder="Entrez le nom de l'école précédente" value="{{ old('previous_school_name') }}">
                                                                                    @error('previous_school_name')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>Champs obligatoire</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                        
                                                                            <div class="col-12 col-sm-4">
                                                                                <div class="form-group local-forms">
                                                                                    <label>Adresse de l'école précédente <span class="login-danger">*</span></label>
                                                                                    <input type="text" class="form-control @error('previous_school_address') is-invalid @enderror" name="previous_school_address" placeholder="Entrez l'adresse de l'école précédente" value="{{ old('previous_school_address') }}">
                                                                                    @error('previous_school_address')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>Champs obligatoire</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                        
                                                                            <div class="col-12 col-sm-4">
                                                                                <div class="form-group local-forms">
                                                                                    <label>Dernière classe fréquentée <span class="login-danger">*</span></label>
                                                                                    <input type="text" class="form-control @error('last_class_attended') is-invalid @enderror" name="last_class_attended" placeholder="Entrez la dernière classe fréquentée" value="{{ old('last_class_attended') }}">
                                                                                    @error('last_class_attended')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>Champs obligatoire</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                        
                                                                            <div class="col-12 col-sm-4">
                                                                                <div class="form-group local-forms">
                                                                                    <label>Certificat de naissance (image) <span class="login-danger">*</span></label>
                                                                                    <input type="file" class="form-control @error('birth_certificate') is-invalid @enderror" name="birth_certificate">
                                                                                    @error('birth_certificate')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>Champs obligatoire</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                        
                                                                            <div class="col-12 col-sm-4">
                                                                                <div class="form-group local-forms">
                                                                                    <label>Bulletin de notes (image) <span class="login-danger">*</span></label>
                                                                                    <input type="file" class="form-control @error('school_report') is-invalid @enderror" name="school_report">
                                                                                    @error('school_report')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>Champs obligatoire</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                        
                                                                            <div class="col-12 col-sm-4">
                                                                                <div class="form-group local-forms">
                                                                                    <label>Formulaire d'inscription (image) <span class="login-danger">*</span></label>
                                                                                    <input type="file" class="form-control @error('registration_form') is-invalid @enderror" name="registration_form">
                                                                                    @error('registration_form')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>Champs obligatoire</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                        
                                                                            <div class="col-12">
                                                                                <div class="student-submit">
                                                                                    <button type="submit" class="btn btn-primary">Ajouter l'étudiant</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                            </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endsection
                                        