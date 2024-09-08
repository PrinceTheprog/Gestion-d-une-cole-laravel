@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Modifier un emploi du temps</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('timetable/list/page') }}">Emplois du temps</a></li>
                                <li class="breadcrumb-item active">Modifier</li>
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
                            <form action="{{ route('timetable/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <input type="hidden" name="id" value="{{ $timetable->id }}">
                                
                                <div class="row">
                                    <!-- Include fields similar to create form but with existing values -->
                                    <!-- Example fields -->
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Classe <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('class_id') is-invalid @enderror" name="class_id">
                                                <option selected disabled>Sélectionner la classe</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}" {{ $class->id == $timetable->class_id ? 'selected' : '' }}>{{ $class->nom_classe }}</option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Cours <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('cours_id') is-invalid @enderror" name="cours_id">
                                                <option selected disabled>Sélectionner le cours</option>
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('cours_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Professeur</label>
                                            <select class="form-control select @error('teacher_id') is-invalid @enderror" name="teacher_id">
                                                <option selected disabled>Sélectionner le professeur</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Année <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('year_id') is-invalid @enderror" name="year_id">
                                                <option selected disabled>Sélectionner l'année</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('year_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Période <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('period_id') is-invalid @enderror" name="period_id">
                                                <option selected disabled>Sélectionner la période</option>
                                                @foreach($periods as $period)
                                                    <option value="{{ $period->id }}">{{ $period->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('period_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Add other fields here with similar logic -->
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Description <span class="login-danger">*</span></label>
                                            <textarea class="form-control @error('schedule') is-invalid @enderror" name="schedule">{{ $timetable->schedule }}</textarea>
                                            @error('schedule')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="note-submit">
                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
