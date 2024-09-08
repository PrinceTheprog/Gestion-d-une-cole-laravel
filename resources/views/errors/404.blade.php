@extends('layouts.error')
@section('content')
    <div class="main-wrapper">
        <div class="error-box">
            <h1>404</h1>
            <h3 class="h2 mb-3"><i class="fas fa-exclamation-triangle"></i> Oops! Page no trouvé!</h3>
            <p class="h4 font-weight-normal">La page que vous recherchez n'a pas été trouvé.</p>
            <a href="{{route('home')}}" class="btn btn-primary">Revenir en arrière</a>
        </div>
    </div>
@endsection
