@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Emplois du temps</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Emplois du temps</li>
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
                            <a href="{{ route('timetable/add/page') }}" class="btn btn-primary">Ajouter un emploi du temps</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Classe</th>
                                        <th>Cours</th>
                                        <th>Professeur</th>
                                        <th>Année</th>
                                        <th>Période</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($timetables as $timetable)
                                        <tr>
                                            <td>{{ $timetable->classe->nom_classe }}</td>
                                            <td>{{ $timetable->cours->name }}</td>
                                            <td>{{ $timetable->teacher->full_name }}</td>
                                            <td>{{ $timetable->year->name }}</td>
                                            <td>{{ $timetable->period->name }}</td>
                                            <td>{{ $timetable->schedule }}</td>
                                            <td>
                                                <a href="{{ url('timetable/edit/'.$timetable->id) }}" class="btn btn-warning">Modifier</a>
                                                <form action="{{ route('timetable/delete') }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$timetable->id }}"> 
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
