@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Elèves</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/list') }}">Elève</a></li>
                                <li class="breadcrumb-item active">Tous les Elèves</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="student-group-form">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" id="searchById" class="form-control" placeholder="Chercher par ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" id="searchByName" class="form-control" placeholder="Chercher par Nom ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" id="searchByAdmissionId" class="form-control" placeholder="Chercher par ID d'admission ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" id="searchByFirstName" class="form-control" placeholder="Chercher par Prénom ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <select id="class-select" class="form-control">
                                <option value="" selected disabled>Classe</option>
                                <option value="6 ème">6 ème</option>
                                <option value="5 ème">5 ème</option>
                                <option value="4 ème">4 ème</option>
                                <option value="3 ème">3 ème</option>
                                <option value="Seconde">Seconde</option>
                                <option value="Première">Première</option>
                                <option value="Terminale">Terminale</option>
                                <!-- Ajoutez d'autres options de classe ici -->
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-student-btn">
                            <button type="button" class="btn btn-primary" id="searchButton">Chercher</button>
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
                                        <h3 class="page-title">Elèves</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ route('student/list') }}" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                        <a href="{{ route('student/grid') }}" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download" onclick="window.print();"></i> </a>
                                        <a href="{{ route('student/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Classe</th>
                                            <th>admission ID</th>
                                            <th>Sexe</th>
                                            <th>Date de naissance</th>
                                            <th>Groupe sanguin</th>
                                            <th>Religion</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Addresse</th>
                                            <th>Nom parent</th>
                                            <th>Profession du parent</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentList as $key=>$list )
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td>{{ ++$key }}</td>
                                            <td hidden class="id">{{ $list->id }}</td>
                                            <td hidden class="avatar">{{ $list->upload }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{ url('student/profile/'.$list->id) }}" class="avatar avatar-sm me-2">
                                                        @if (!empty($list->upload))
                                                        <img class="avatar-img rounded-circle" src="{{ URL::to('images/student-photos/'.$list->upload) }}" alt="{{ $list->name }}" class="img-thumbnail" style="width: 50px; height: 50px;">
                                                        @else
                                                        <img class="avatar-img rounded-circle" src="{{ URL::to('images/photo_defaults.jpg') }}" alt="{{ $list->name }}" class="img-thumbnail" style="width: 50px; height: 50px;">
                                                        @endif
                                                    </a>
                                                    <a href="{{ url('student/profile/'.$list->id) }}">{{ $list->first_name }} {{ $list->last_name }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ $list->class }}</td>
                                            <td>{{ $list->admission_id }}</td>
                                            <td>{{ $list->gender }}</td>
                                            <td>{{ $list->date_of_birth }}</td>
                                            <td>{{ $list->blood_group }}</td>
                                            <td>{{ $list->religion }}</td>
                                            <td>{{ $list->email }}</td>
                                            <td>{{ $list->phone_number }}</td>
                                            <td>{{ $list->roll }}</td>
                                            <td>{{ $list->parent_name }}</td>
                                            <td>{{ $list->parent_profession }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ url('student/edit/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light student_delete" data-bs-toggle="modal" data-bs-target="#studentUser">
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

    {{-- modal student delete --}}
    <div class="modal fade contentmodal" id="studentUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x-circle"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student/delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" class="e_id" value="">
                        <input type="hidden" name="avatar" class="e_avatar" value="">
                        <div class="delete-wrap text-center">
                            <div class="del-icon">
                                <i class="feather-x-circle"></i>
                            </div>
                            <h2>Êtes-vous sûr de vouloir supprimer ?</h2>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-success me-2">Oui</button>
                                <a class="btn btn-danger" data-bs-dismiss="modal">Non</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function filterTable() {
                var idFilter = document.getElementById('searchById').value.toLowerCase();
                var nameFilter = document.getElementById('searchByName').value.toLowerCase();
                var admissionIdFilter = document.getElementById('searchByAdmissionId').value.toLowerCase();
                var firstNameFilter = document.getElementById('searchByFirstName').value.toLowerCase();
                var classFilter = document.getElementById('class-select').value;

                var table = document.querySelector('.table');
                var rows = table.getElementsByTagName('tr');

                for (var i = 1; i < rows.length; i++) {
                    var idCell = rows[i].getElementsByTagName('td')[1];
                    var nameCell = rows[i].getElementsByTagName('td')[2];
                    var admissionIdCell = rows[i].getElementsByTagName('td')[4];
                    var firstNameCell = rows[i].getElementsByTagName('td')[2];
                    var classCell = rows[i].getElementsByTagName('td')[3];

                    if (idCell && nameCell && admissionIdCell && firstNameCell && classCell) {
                        var idText = idCell.textContent.toLowerCase();
                        var nameText = nameCell.textContent.toLowerCase();
                        var admissionIdText = admissionIdCell.textContent.toLowerCase();
                        var firstNameText = firstNameCell.textContent.toLowerCase();
                        var classText = classCell.textContent;

                        if ((idText.indexOf(idFilter) > -1 || !idFilter) &&
                            (nameText.indexOf(nameFilter) > -1 || !nameFilter) &&
                            (admissionIdText.indexOf(admissionIdFilter) > -1 || !admissionIdFilter) &&
                            (firstNameText.indexOf(firstNameFilter) > -1 || !firstNameFilter) &&
                            (classText === classFilter || !classFilter)) {
                            rows[i].style.display = '';
                        } else {
                            rows[i].style.display = 'none';
                        }
                    }
                }
            }

            document.getElementById('searchById').addEventListener('input', filterTable);
            document.getElementById('searchByName').addEventListener('input', filterTable);
            document.getElementById('searchByAdmissionId').addEventListener('input', filterTable);
            document.getElementById('searchByFirstName').addEventListener('input', filterTable);
            document.getElementById('class-select').addEventListener('change', filterTable);
        });
    </script>

    {{-- delete js --}}
    <script>
        $(document).on('click', '.student_delete', function() {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
            $('.e_avatar').val(_this.find('.avatar').text());
        });
    </script>
    @endsection
@endsection
