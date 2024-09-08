@extends('layouts.master')
@section('content')

{!! Toastr::message() !!}

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Mettre à jour une note</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Modifier Note</a></li>
                        <li class="breadcrumb-item active">Mettre à jour une note</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('note/update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $noteEdit->id }}">
                            
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Détails de la note</span></h5>
                                </div>
                                 
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Élève <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('student_id') is-invalid @enderror" name="student_id">
                                            <option selected disabled>Sélectionner un élève</option>
                                            @foreach($students as $student)
                                                <option value="{{ $student->id }}" {{ old('student_id', $noteEdit->student_id) == $student->id ? 'selected' : '' }}>
                                                    {{ $student->first_name }} {{ $student->last_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('student_id')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Cours <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('course_id') is-invalid @enderror" name="course_id">
                                            <option selected disabled>Sélectionner un cours</option>
                                            @foreach($cours as $course)
                                                <option value="{{ $course->id }}" {{ old('course_id', $noteEdit->course_id) == $course->id ? 'selected' : '' }}>
                                                    {{ $course->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Note <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="note" value="{{ old('note', $noteEdit->note) }}">
                                        @error('note')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Commentaire</label>
                                        <input type="text" class="form-control" name="comments" value="{{ old('comments', $noteEdit->comments) }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- Bouton de suppression de la note --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
