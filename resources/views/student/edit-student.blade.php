@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Editer l'élève</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('student/add/page') }}">Elève</a>
                                </li>
                                <li class="breadcrumb-item active">Editer l'élève</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Affichage des messages --}}
            {!! Toastr::message() !!}

            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('student/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $studentEdit->id }}">

                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Informations sur l'élève</h5>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom <span class="login-danger">*</span></label>
                                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ $studentEdit->first_name }}">
                                            @error('first_name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Prénoms <span class="login-danger">*</span></label>
                                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ $studentEdit->last_name }}">
                                            @error('last_name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Sexe <span class="login-danger">*</span></label>
                                            <select name="gender" class="form-control select @error('gender') is-invalid @enderror">
                                                <option disabled>Sélectionnez le sexe</option>
                                                <option value="Femme" {{ $studentEdit->gender == 'Femme' ? 'selected' : '' }}>Féminin</option>
                                                <option value="Homme" {{ $studentEdit->gender == 'Homme' ? 'selected' : '' }}>Masculin</option>
                                                <option value="Autres" {{ $studentEdit->gender == 'Autres' ? 'selected' : '' }}>Autres</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Date de naissance <span class="login-danger">*</span></label>
                                            <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ $studentEdit->date_of_birth }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Addresse</label>
                                            <input type="text" name="roll" class="form-control @error('roll') is-invalid @enderror" value="{{ $studentEdit->roll }}">
                                            @error('roll')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="form-title student-info"> Autres information de l'élève
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Groupe sanguin <span class="login-danger">*</span></label>
                                            <select name="blood_group" class="form-control select @error('blood_group') is-invalid @enderror">
                                                <option disabled>Sélectionnez le groupe sanguin</option>
                                                <option value="A+" {{ $studentEdit->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                                <option value="B+" {{ $studentEdit->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                                <option value="O+" {{ $studentEdit->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                            </select>
                                            @error('blood_group')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Religion <span class="login-danger">*</span></label>
                                            <select name="religion" class="form-control select @error('religion') is-invalid @enderror">
                                                <option disabled>Sélectionnez la religion</option>
                                                <option value="Musulman" {{ $studentEdit->religion == 'Musulman' ? 'selected' : '' }}>Musulman</option>
                                                <option value="Chrétien" {{ $studentEdit->religion == 'Chrétien' ? 'selected' : '' }}>Chrétien</option>
                                                <option value="Autres" {{ $studentEdit->religion == 'Autres' ? 'selected' : '' }}>Autres</option>
                                            </select>
                                            @error('religion')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $studentEdit->email }}">
                                            @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Classe <span class="login-danger">*</span></label>
                                            <select name="class" class="form-control select @error('class') is-invalid @enderror">
                                                <option selected disabled>Sélectionnez la classe</option>
                                                <option value="6 ème" {{ $studentEdit->class == '6 ème' ? "selected" :""}}>6 ème</option>
                                                <option value="5 ème" {{ $studentEdit->class  == '5 ème' ? "selected" :""}}>5 ème</option>
                                                <option value="4 ème" {{ $studentEdit->class == '4 ème' ? "selected" :""}}>4 ème</option>
                                                <option value="3 ème" {{ $studentEdit->class == '3 ème' ? "selected" :""}}>3 ème</option>
                                                <option value="Seconde" {{ $studentEdit->class == 'Seconde' ? "selected" :""}}>Seconde </option>
                                                <option value="Première" {{ $studentEdit->class  == 'Première' ? "selected" :""}}>Première </option>
                                                <option value="Terminale" {{ $studentEdit->class  == 'Terminale' ? "selected" :""}}>Terminale</option>
                                                
                                            </select>
                                            @error('class')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Section <span class="login-danger">*</span></label>
                                            <select name="section" class="form-control select @error('section') is-invalid @enderror">
                                                <option disabled>Sélectionnez la section</option>
                                                <option value="A" {{ $studentEdit->section == 'A' ? 'selected' : '' }}>A</option>
                                                <option value="B" {{ $studentEdit->section == 'B' ? 'selected' : '' }}>B</option>
                                                <option value="C" {{ $studentEdit->section == 'C' ? 'selected' : '' }}>C</option>
                                            </select>
                                            @error('section')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Admission ID</label>
                                            <input type="text" name="admission_id" readonly class="form-control @error('admission_id') is-invalid @enderror" value="{{ $studentEdit->admission_id }}">
                                            @error('admission_id')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

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
                                            <input type="text" class="form-control @error('parent_name') is-invalid @enderror" name="parent_name" value="{{ $studentEdit->parent_name }}">
                                            @error('parent_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Profession du parent <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('parent_profession') is-invalid @enderror" name="parent_profession" value="{{ $studentEdit->parent_profession }}">
                                            @error('parent_profession')
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
                                    
                                    <div class="col-12">
                                        <h5 class="form-title student-info"> Information de supplémentaire
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom et adresse de l'école précédente <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('previous_school_name') is-invalid @enderror" name="previous_school_name" value="{{ $studentEdit->previous_school_name }}">
                                            @error('previous_school_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Dernière classe fréquentée <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('last_class_attended') is-invalid @enderror" name="last_class_attended" value="{{ $studentEdit->last_class_attended }}">
                                            @error('last_class_attended')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Champs obligatoire</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label for="birth_certificate" class="form-label">Certificat de naissance (image) </label>
                                            <div class="input-group">
                                                <input type="file" class="form-control @error('birth_certificate') is-invalid @enderror" id="birth_certificate" name="birth_certificate" aria-describedby="birthCertificateHelp" value ="{{ $studentEdit->birth_certificate }}">
                                                <label class="input-group-text" for="birth_certificate"></label>
                                            </div>
                                            @error('birth_certificate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label for="school_report" class="form-label">Bulletin scolaire (image) </label>
                                            <div class="input-group">
                                                <input type="file" class="form-control @error('school_report') is-invalid @enderror" id="school_report" name="school_report" aria-describedby="schoolReportHelp">
                                                <label class="input-group-text" for="school_report"></label>
                                            </div>
                                            @error('school_report')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label for="registration_form" class="form-label">Formulaire d'inscription (image)</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control @error('registration_form') is-invalid @enderror" id="registration_form" name="registration_form" aria-describedby="registrationFormHelp">
                                                <label class="input-group-text" for="registration_form"></label>
                                            </div>
                                            @error('registration_form')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
