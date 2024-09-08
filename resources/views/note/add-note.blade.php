@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Ajouter une note</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('note/add/page') }}">Note</a></li>
                                <li class="breadcrumb-item active">Ajouter une note</li>
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
                            <form action="{{ route('note/add/save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title note-info"> Information sur la note
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom du cours <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('course_id') is-invalid @enderror" name="course_id">
                                                <option selected disabled>Sélectionner le cours</option>
                                                @foreach($cours as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('course_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Note <span class="login-danger">*</span></label>
                                            <input type="number" class="form-control @error('note') is-invalid @enderror" name="note" placeholder="Entrez la note" value="{{ old('note') }}">
                                            @error('note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Coefficient <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('grade') is-invalid @enderror" name="grade">
                                                <option selected disabled>Sélectionner le coefficient</option>
                                                <option value="/20" {{ old('grade') == '/20' ? "selected" :""}}>/20</option>
                                                <option value="/40" {{ old('grade') == '/40' ? "selected" :""}}>/40</option>
                                                <option value="/60" {{ old('grade') == '/60' ? "selected" :""}}>/60</option>
                                            </select>
                                            @error('grade')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Identifiant de l'élève</label>
                                            <select class="form-control select @error('student_id') is-invalid @enderror" name="student_id">
                                                <option selected disabled>Sélectionner l'élève</option>
                                                @foreach($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-12 col-sm-4 local-forms">
                                        <div class="form-group">
                                            <label>Commentaire <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('comments') is-invalid @enderror" name="comments" placeholder="Entrez commentaire" value="{{ old('comments') }}">
                                            @error('comments')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="note-submit">
                                            <button type="submit" class="btn btn-primary">Envoyer</button>
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
