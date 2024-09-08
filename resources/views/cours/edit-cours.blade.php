@extends('layouts.master')
@section('content')

{{-- Display Toastr messages --}}
{!! Toastr::message() !!}

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Mettre à jour un cours</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Mettre à jour Cours</a></li>
                        <li class="breadcrumb-item active">Mettre à jour un cours</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('cours/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $cours->id }}">
                            {{-- @method('PUT') Utilisation de la méthode PUT pour la mise à jour --}}
                        
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span> Détails du cours</span></h5>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom du cours <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $cours->name) }}">
                                        @error('name')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Description <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="description" value="{{ old('description', $cours->description) }}">
                                        @error('description')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Coefficient <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('class') is-invalid @enderror" name="class">
                                            <option selected disabled>Sélectionner le coefficient</option>
                                            <option value="/20" {{ old('class', $cours->class) == '/20' ? 'selected' : '' }}>/20</option>
                                            <option value="/40" {{ old('class', $cours->class) == '/40' ? 'selected' : '' }}>/40</option>
                                            <option value="/60" {{ old('class', $cours->class) == '/60' ? 'selected' : '' }}>/60</option>
                                        </select>
                                        @error('class')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Ce champ est obligatoire</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Professeur</label>
                                        <select class="form-control select @error('teacher_id') is-invalid @enderror" name="teacher_id">
                                            <option selected disabled>Professeur</option>
                                            @foreach($professeurs as $course)
                                                <option value="{{ $course->id }}">{{ $course->full_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('teacher_id')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Classe <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('room_id') is-invalid @enderror" name="room_id">
                                            <option selected disabled>Sélectionner la classe</option>
                                            @foreach($classe as $classe)
                                            <option value="{{ $classe->id }}">{{ $classe->nom_classe }}</option>
                                        @endforeach
                                        </select>
                                        @error('room_id')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- Bouton de suppression du cours --}}
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
