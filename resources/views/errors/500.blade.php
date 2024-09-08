@extends('layouts.error')
@section('content')
    <div class="main-wrapper">
        <div class="error-box">
            <h1>500</h1>
            <h3 class="h2 mb-3"><i class="fas fa-exclamation-triangle"></i> Erreur serveur</h3>
            <p class="h4 font-weight-normal">Pas de permission pour la page demandée</p>
            <a href="{{route('home')}}" class="btn btn-primary">Revenir en arrière</a>
        </div>
    </div>
@endsection