@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Ajouter une Assiduité</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('attendance/list/page') }}">Présences</a></li>
                                <li class="breadcrumb-item active">Ajouter</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('attendance/save') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Sélection de l'utilisateur (par exemple, un étudiant ou un enseignant) -->
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Utilisateur <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('user_id') is-invalid @enderror" name="user_id">
                                                <option selected disabled>Sélectionner l'utilisateur</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Date de l'assiduité -->
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Date <span class="login-danger">*</span></label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}">
                                            @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Statut de l'assiduité (présent, absent, etc.) -->
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Statut <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('status') is-invalid @enderror" name="status">
                                                <option selected disabled>Sélectionner le statut</option>
                                                <option value="present">Présent</option>
                                                <option value="absent">Absent</option>
                                                <option value="late">En retard</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Raison de l'absence ou du retard (optionnel) -->
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Raison <span class="login-danger">*</span></label>
                                            <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" placeholder="Entrez la raison (optionnel)">{{ old('reason') }}</textarea>
                                            @error('reason')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Bouton d'enregistrement -->
                                    <div class="col-12">
                                        <div class="note-submit">
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
