@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Début de l'en-tête de la page -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Liste des Assiduités</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href=" ">Tableau de bord</a></li>
                                <li class="breadcrumb-item active">Assiduités</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin de l'en-tête de la page -->

            <!-- Affichage des messages Toastr -->
            {!! Toastr::message() !!}

            <!-- Début du contenu principal -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="card-title">Toutes les Assiduités</h5>
                                <a href="{{ route('attendance/add/page') }}" class="btn btn-primary">
                                    <i class="feather-plus"></i> Ajouter une Assiduité
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Utilisateur</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th>Raison</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($attendances as $key => $attendance)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $attendance->user->name ?? 'Non défini' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d/m/Y') }}</td>
                                                <td>
                                                    @if($attendance->status == 'present')
                                                        <span class="badge badge-success">Présent</span>
                                                    @elseif($attendance->status == 'absent')
                                                        <span class="badge badge-danger">Absent</span>
                                                    @elseif($attendance->status == 'late')
                                                        <span class="badge badge-warning">En retard</span>
                                                    @else
                                                        <span class="badge badge-secondary">Inconnu</span>
                                                    @endif
                                                </td>
                                                <td>{{ $attendance->reason ?? 'Aucune raison fournie' }}</td>
                                                <td>
                                                    <a href="{{url('attendance/edit/'.$attendance->id) }}" class="btn btn-sm btn-info">
                                                        <i class="feather-edit"></i> Éditer
                                                    </a>
                                                    <form action="{{ route('attendance/delete', $attendance->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <a class="btn btn-sm bg-danger-light cours_delete" data-bs-toggle="modal" data-bs-target="#coursUser">
                                                            <i class="feather-trash-2 me-1"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination si nécessaire -->
                            {{-- 
                            <div class="mt-4">
                                {{ $attendances->links() }}
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin du contenu principal -->
        </div>
    </div>
    <div class="modal fade contentmodal" id="coursUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="feather-x-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="{{ route('attendance/delete') }}" method="POST" style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="id" value="{{$attendance->id }}"> 
                       {{-- @method('DELETE')  Utilisation de la méthode DELETE pour la suppression --}}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">Supprimer le cours</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
