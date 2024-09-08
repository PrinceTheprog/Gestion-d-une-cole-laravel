
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Cours</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('cours/list') }}">Cours</a></li>
                                <li class="breadcrumb-item active">Tous les Cours</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="cours-group-form">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by Name ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by Phone ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-cours-btn">
                            <button type="btn" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Cours</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ route('cours/list') }}" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                        <a href="{{ route('cours/grid') }}" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> </a>
                                        <a href="{{ route('cours/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-cours table-hover table-center mb-0 datatable table-striped">
                                    <thead class="cours-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Cours</th>
                                            <th>Description</th>
                                            <th>Professeur</th>
                                            <th>Classe</th>
                                            <th>Date de création </th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coursList as $key=>$list )
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td>Pre-{{ ++$key }}</td>
                                            <td hidden class="id">{{ $list->id }}</td>
                                            <td>{{$list->name}}</td>
                                            <td>{{$list->description}}</td>
                                            <td>{{$list->teacher->full_name}}</td>
                                            <td>{{$list->classe->nom_classe}}</td>
                                            <td>{{$list->created_at}}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ url('cours/edit/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light cours_delete" data-bs-toggle="modal" data-bs-target="#coursUser">
                                                        <i class="feather-trash-2 me-1"></i>
                                                    </a>
                                                </div>
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
    </div>
    {{-- model cours delete --}}
    <div class="modal fade contentmodal" id="coursUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="feather-x-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="{{ route('cours/delete') }}" method="POST" style="margin-top: 20px;">
                        @csrf
                        {{--<input type="hidden" name="id" value="{{$list->id }}"> 
                        @method('DELETE')  Utilisation de la méthode DELETE pour la suppression --}}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">Supprimer le cours</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')

    {{-- delete js --}}
    <script>
        $(document).on('click','.cours_delete',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
            $('.e_avatar').val(_this.find('.avatar').text());
        });
    </script>
    @endsection

@endsection
