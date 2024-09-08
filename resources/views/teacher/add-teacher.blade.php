
@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        
        <div class="page-header">
            <div class="row align-items-cEntrez">
                <div class="col">
                    <h3 class="page-title">Ajouter un professeur </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="teachers.html">Professeur</a></li>
                        <li class="breadcrumb-item active">Ajouter professeur</li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('teacher/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Details </span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" placeholder="Entrez le nom complet" value="{{ old('full_name') }}">
                                        @error('full_name')
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
                                            <option selected disabled>Selectionner le sexe</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? "selected" :"Female"}}>Femme</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? "selected" :""}}>Homme</option>
                                            <option value="Others" {{ old('gender') == 'Others' ? "selected" :""}}>Autres</option>
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
                                        <label>Date de naissance <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" placeholder="DD-MM-YYYY" value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Télephone <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Entrez son numéro de Téléphone" value="{{ old('mobile') }}">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>   Date d'arrrivée <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control datetimepicker @error('joining_date') is-invalid @enderror" name="joining_date" placeholder="DD-MM-YYYY" value="{{ old('joining_date') }}">
                                        @error('joining_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 local-forms">
                                    <div class="form-group">
                                        <label>Qualification <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('qualification') is-invalid @enderror" name="qualification">
                                            <option selected disabled>Selectionner sa qualification</option>
                                            <option value="Baccalauréat" {{ old('qualification') == 'Baccalauréat' ? "selected" :""}}>Baccalauréat</option>
                                            <option value="Licence" {{ old('qualification') == 'Licence' ? "selected" :""}}>Licence</option>
                                            <option value="Master" {{ old('qualification') == 'Master' ? "selected" :""}}>Master</option>
                                        </select>
                                        @error('qualification')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Expérience <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" placeholder="Entrez l'Experience" value="{{ old('experience') }}">
                                        @error('experience')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Details de Connexion </span></h5>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Email ID <span class="login-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrez l'Email " value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom d'utilisateur <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Entrez le nom" value="{{ old('username') }}">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mot de passe <span class="login-danger">*</span></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Entrez le mot de passe" value="{{ old('password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Répeter le mot de passe <span class="login-danger">*</span></label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Retapez le mot de passe" value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Addresse</span></h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Addresse <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Entrez l'addresse" value="{{ old('address') }}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Ville <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="Entrez le quartier" value="{{ old('city') }}">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Région <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" placeholder="Entrez la région" value="{{ old('state') }}">
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Code postal <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" placeholder="Entrez le Zip" value="{{ old('zip_code') }}">
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Pays <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" placeholder="Entrez le pays" value="{{ old('country') }}">
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Champs obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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
