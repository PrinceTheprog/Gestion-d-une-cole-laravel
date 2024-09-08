@extends('layouts.master')
@section('content')

{!! Toastr::message() !!}

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Mettre à jour l'assiduité</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Assiduité</a></li>
                        <li class="breadcrumb-item active">Mettre à jour l'assiduité</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('attendance/update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $attendanceEdit->id }}">

                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Détails de l'assiduité</span></h5>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Utilisateur <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('user_id') is-invalid @enderror" name="user_id">
                                            <option selected disabled>Sélectionner un utilisateur</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ old('user_id', $attendanceEdit->user_id) == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Date <span class="login-danger">*</span></label>
                                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $attendanceEdit->date) }}">
                                        @error('date')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Statut <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('status') is-invalid @enderror" name="status">
                                            <option value="Present" {{ old('status', $attendanceEdit->status) == 'Present' ? 'selected' : '' }}>Présent</option>
                                            <option value="Absent" {{ old('status', $attendanceEdit->status) == 'Absent' ? 'selected' : '' }}>Absent</option>
                                            <option value="Late" {{ old('status', $attendanceEdit->status) == 'Late' ? 'selected' : '' }}>Retard</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">Ce champ est obligatoire</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Raison</label>
                                        <input type="text" class="form-control" name="reason" value="{{ old('reason', $attendanceEdit->reason) }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="student-submit">
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
