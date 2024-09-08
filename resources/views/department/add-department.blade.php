
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Ajouter un Departement</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Departements.html">Departement</a></li>
                            <li class="breadcrumb-item active">Ajouter un Departement</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Departement Details</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Departement ID <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="Departement_id">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nom du Departement  <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="Departement_dame">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Head of Departement <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="head_of_Departement">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Date du début du Departement <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" type="text" name="Departement_start_date" placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Numéro de l'étudiant <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="no_of_students">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
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
