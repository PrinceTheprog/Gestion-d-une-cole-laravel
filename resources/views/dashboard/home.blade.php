
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}



<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Bienvenue {{ Session::get('name') }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="breadcrumb-item active">{{ Session::get('name') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
@if (Session::get('role_name') === 'Teachers')
<div class="row">
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Nbre Total de classe</h6>
                        <h3>04/16</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Total d'etudiants</h6>
                        <h3>40/460</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/dash-icon-01.svg') }}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Total de cours</h6>
                        <h3>30/50</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-02.svg') }}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Total d'heure</h6>
                        <h3>15/20</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-03.svg') }}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12 col-lg-12 col-xl-8">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-8 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Leçons en attente</h5>
                            </div>
                            <div class="col-6">
                                <span class="float-end view-link"><a href="#"> Voir tous les cours
                                        </a></span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 pb-3">
                        <div class="table-responsive lesson">
                            <table class="table table-center">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="date">
                                                <b>Lessons 30</b>
                                                <p>3.1 Ipsuum dolor</p>
                                                <ul class="teacher-date-list">
                                                    <li><i class="fas fa-calendar-alt me-2"></i>Sep 5,
                                                        2022</li>
                                                    <li>|</li>
                                                    <li><i class="fas fa-clock me-2"></i>09:00 - 10:00
                                                        am</li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="lesson-confirm">
                                                <a href="#">Confirmed</a>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-info">Reschedule</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="date">
                                                <b>Lessons 30</b>
                                                <p>3.1 Ipsuum dolor</p>
                                                <ul class="teacher-date-list">
                                                    <li><i class="fas fa-calendar-alt me-2"></i>Sep 5,
                                                        2022</li>
                                                    <li>|</li>
                                                    <li><i class="fas fa-clock me-2"></i>09:00 - 10:00
                                                        am</li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="lesson-confirm">
                                                <a href="#">Confirmed</a>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-info">Pragrmme</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-4 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="card-title">Evolution du Semestre</h5>
                            </div>
                        </div>
                    </div>
                    <div class="dash-widget">
                        <div class="circle-bar circle-bar1">
                            <div class="circle-graph1" data-percent="50">
                                <div class="progress-less">
                                    <b>55/60</b>
                                    <p>Progrssion des lessons</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Evolution des activités des cours</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-blue"></span>Professeur</li>
                                    <li><span class="circle-green"></span>Etudiant</li>
                                    <li class="star-menus"><a href="javascript:;"><i
                                                class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="school-area"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Historique des cours</h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i
                                        class="fas fa-ellipsis-v"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="teaching-card">
                            <ul class="steps-history">
                                <li>Sep22</li>
                                <li>Sep23</li>
                                <li>Sep24</li>
                            </ul>
                            <ul class="activity-feed">
                                <li class="feed-item d-flex align-items-center">
                                    <div class="dolor-activity">
                                        <span class="feed-text1"><a>Mathematiques</a></span>
                                        <ul class="teacher-date-list">
                                            <li><i class="fas fa-calendar-alt me-2"></i>September 5,
                                                2022</li>
                                            <li>|</li>
                                            <li><i class="fas fa-clock me-2"></i>09:00 am - 10:00 am (60
                                                Minutes)</li>
                                        </ul>
                                    </div>
                                    <div class="activity-btns ms-auto">
                                        <button type="submit" class="btn btn-info">En progression</button>
                                    </div>
                                </li>
                                <li class="feed-item d-flex align-items-center">
                                    <div class="dolor-activity">
                                        <span class="feed-text1"><a>Geography </a></span>
                                        <ul class="teacher-date-list">
                                            <li><i class="fas fa-calendar-alt me-2"></i>September 5,
                                                2022</li>
                                            <li>|</li>
                                            <li><i class="fas fa-clock me-2"></i>09:00 am - 10:00 am (60
                                                Minutes)</li>
                                        </ul>
                                    </div>
                                    <div class="activity-btns ms-auto">
                                        <button type="submit" class="btn btn-info">Complèter</button>
                                    </div>
                                </li>
                                <li class="feed-item d-flex align-items-center">
                                    <div class="dolor-activity">
                                        <span class="feed-text1"><a>Botony</a></span>
                                        <ul class="teacher-date-list">
                                            <li><i class="fas fa-calendar-alt me-2"></i>September 5,
                                                2022</li>
                                            <li>|</li>
                                            <li><i class="fas fa-clock me-2"></i>09:00 am - 10:00 am (60
                                                Minutes)</li>
                                        </ul>
                                    </div>
                                    <div class="activity-btns ms-auto">
                                        <button type="submit" class="btn btn-info">In Progress</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill comman-shadow">
            <div class="card-body">
                <div id="calendar-doctor" class="calendar-container"></div>
                <div class="calendar-info calendar-info1">
                    <div class="up-come-header">
                        <h2>Evenements à suivre</h2>
                        <span><a href="javascript:;"><i class="feather-plus"></i></a></span>
                    </div>
                    <div class="upcome-event-date">
                        <h3>10 Jan</h3>
                        <span><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                    <div class="calendar-details">
                        <p>08:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>Botony</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>08:00 - 09:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>09:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>Botony</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>09:00 - 10:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>10:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>Botony</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>10:00 - 11:00 am</span>
                        </div>
                    </div>
                    <div class="upcome-event-date">
                        <h3>10 Jan</h3>
                        <span><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                    <div class="calendar-details">
                        <p>08:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>English</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>08:00 - 09:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>09:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>Mathematics </h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>09:00 - 10:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>10:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>History</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>10:00 - 11:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>11:00 am</p>
                        <div class="calendar-box break-bg">
                            <div class="calandar-event-name">
                                <h4>Break</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>11:00 - 12:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>11:30 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>History</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>11:30 - 12:00 am</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endif

@if (Session::get('role_name') === 'Student')
<div class="row">
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Classe</h6>
                        <h3>04/06</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Tous les projets</h6>
                        <h3>40/60</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{URL::to('assets/img/icons/teacher-icon-02.svg')}}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Teste en attente</h6>
                        <h3>30/50</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{URL::to('assets/img/icons/student-icon-01.svg')}}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Teste Passé</h6>
                        <h3>15/20</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{URL::to('assets/img/icons/student-icon-02.svg')}}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-12 col-xl-8">
        <div class="card flex-fill comman-shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title">Cours du jour</h5>
                    </div>
                    <div class="col-6">
                        <ul class="chart-list-out">
                            <li>
                                <span class="circle-blue"></span>
                                <span class="circle-gray"></span>
                                <span class="circle-gray"></span>
                            </li>
                            <li class="lesson-view-all"><a href="#">Voir  tous</a></li>
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dash-circle">
                <div class="row">
                    <div class="col-lg-3 col-md-3 dash-widget1">
                        <div class="circle-bar circle-bar2">
                            <div class="circle-graph2" data-percent="80">
                                <b>80%</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="dash-details">
                            <div class="lesson-activity">
                                <div class="lesson-imgs">
                                    <img src="{{URL::to('assets/img/icons/lesson-icon-01.svg')}}" alt="">
                                </div>
                                <div class="views-lesson">
                                    <h5>Classe</h5>
                                    <h4>IRT</h4>
                                </div>
                            </div>
                            <div class="lesson-activity">
                                <div class="lesson-imgs">
                                    <img src="{{URL::to('assets/img/icons/lesson-icon-02.svg')}}" alt="">
                                </div>
                                <div class="views-lesson">
                                    <h5>Leçons</h5>
                                    <h4>5 Leçons</h4>
                                </div>
                            </div>
                            <div class="lesson-activity">
                                <div class="lesson-imgs">
                                    <img src="{{URL::to('assets/img/icons/lesson-icon-03.svg')}}" alt="">
                                </div>
                                <div class="views-lesson">
                                    <h5>Temps</h5>
                                    <h4>Leçons</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="dash-details">
                            <div class="lesson-activity">
                                <div class="lesson-imgs">
                                    <img src="{{URL::to('assets/img/icons/lesson-icon-04.svg')}}" alt="">
                                </div>
                                <div class="views-lesson">
                                    <h5>Cours reçu</h5>
                                    <h4>5 Cours reçu</h4>
                                </div>
                            </div>
                            <div class="lesson-activity">
                                <div class="lesson-imgs">
                                    <img src="{{URL::to('assets/img/icons/lesson-icon-05.svg')}}" alt="">
                                </div>
                                <div class="views-lesson">
                                    <h5>Staff</h5>
                                    <h4>John Doe</h4>
                                </div>
                            </div>
                            <div class="lesson-activity">
                                <div class="lesson-imgs">
                                    <img src="{{URL::to('assets/img/icons/lesson-icon-06.svg')}}" alt="">
                                </div>
                                <div class="views-lesson">
                                    <h5>Leçons apprises</h5>
                                    <h4>10/50</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 d-flex align-items-center justify-content-center">
                        <div class="skip-group">
                            <button type="submit" class="btn btn-info skip-btn">Passer</button>
                            <button type="submit" class="btn btn-info continue-btn">Continuer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Evolution des cours</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-blue"></span>Professeur</li>
                                    <li><span class="circle-green"></span>Etudiant</li>
                                    <li class="star-menus"><a href="javascript:;"><i
                                                class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="apexcharts-area"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Historique des professeurs</h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i
                                        class="fas fa-ellipsis-v"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="teaching-card">
                            <ul class="steps-history">
                                <li>Sep22</li>
                                <li>Sep23</li>
                                <li>Sep24</li>
                            </ul>
                            <ul class="activity-feed">
                                <li class="feed-item d-flex align-items-center">
                                    <div class="dolor-activity">
                                        <span class="feed-text1"><a>Mathematiques</a></span>
                                        <ul class="teacher-date-list">
                                            <li><i class="fas fa-calendar-alt me-2"></i>September 5,
                                                2022</li>
                                            <li>|</li>
                                            <li><i class="fas fa-clock me-2"></i>09:00 am - 10:00 am (60
                                                Minutes)</li>
                                        </ul>
                                    </div>
                                    <div class="activity-btns ms-auto">
                                        <button type="submit" class="btn btn-info">En Progression</button>
                                    </div>
                                </li>
                                <li class="feed-item d-flex align-items-center">
                                    <div class="dolor-activity">
                                        <span class="feed-text1"><a>Geographie </a></span>
                                        <ul class="teacher-date-list">
                                            <li><i class="fas fa-calendar-alt me-2"></i>September 5,
                                                2022</li>
                                            <li>|</li>
                                            <li><i class="fas fa-clock me-2"></i>09:00 am - 10:00 am (60
                                                Minutes)</li>
                                        </ul>
                                    </div>
                                    <div class="activity-btns complete ms-auto">
                                        <button type="submit" class="btn btn-info">Complèter</button>
                                    </div>
                                </li>
                                <li class="feed-item d-flex align-items-center">
                                    <div class="dolor-activity">
                                        <span class="feed-text1"><a>Botony</a></span>
                                        <ul class="teacher-date-list">
                                            <li><i class="fas fa-calendar-alt me-2"></i>September 5,
                                                2022</li>
                                            <li>|</li>
                                            <li><i class="fas fa-clock me-2"></i>09:00 am - 10:00 am (60
                                                Minutes)</li>
                                        </ul>
                                    </div>
                                    <div class="activity-btns ms-auto">
                                        <button type="submit" class="btn btn-info">En Progression</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill comman-shadow">
            <div class="card-body">
                <div id="calendar-doctor" class="calendar-container"></div>
                <div class="calendar-info calendar-info1">
                    <div class="up-come-header">
                        <h2>Evenements à suivre</h2>
                        <span><a href="javascript:;"><i class="feather-plus"></i></a></span>
                    </div>
                    <div class="upcome-event-date">
                        <h3>10 Jan</h3>
                        <span><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                    <div class="calendar-details">
                        <p>08:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>Botony</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>08:00 - 09:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>09:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>Botony</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>09:00 - 10:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>10:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>Botony</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>10:00 - 11:00 am</span>
                        </div>
                    </div>
                    <div class="upcome-event-date">
                        <h3>10 Jan</h3>
                        <span><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                    <div class="calendar-details">
                        <p>08:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>English</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>08:00 - 09:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>09:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>Mathematics </h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>09:00 - 10:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>10:00 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>History</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>10:00 - 11:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>11:00 am</p>
                        <div class="calendar-box break-bg">
                            <div class="calandar-event-name">
                                <h4>Break</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>11:00 - 12:00 am</span>
                        </div>
                    </div>
                    <div class="calendar-details">
                        <p>11:30 am</p>
                        <div class="calendar-box normal-bg">
                            <div class="calandar-event-name">
                                <h4>History</h4>
                                <h5>Lorem ipsum sit amet</h5>
                            </div>
                            <span>11:30 - 12:00 am</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endif

@if (Session::get('role_name') === 'Admin' or Session::get('role_name') === 'Super Admin')


<div class="row">
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Total d'étudiants</h6>
                        <h3>{{ $totalStudents }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/dash-icon-01.svg') }}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Total de professeurs</h6>
                        <h3>{{ $totalProfessors }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Total d'inscrits</h6>
                        <h3>{{ $totalUsers }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-02.svg') }}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Total d'étudiants spécifiques</h6>
                        <h3>{{ $specificStudents }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-03.svg') }}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="row">
            <div class="col-md-12 col-lg-6">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Charte graphique</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-blue"></span>Professeur</li>
                                    <li><span class="circle-green"></span>Etudiant</li>
                                    <li class="star-menus"><a href="javascript:;"><i
                                                class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="apexcharts-area"></div>
                    </div>
                </div>

            </div>
            <div class="col-md-12 col-lg-6">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Numéro de l'étudiant</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-blue"></span>Femme</li>
                                    <li><span class="circle-green"></span>Homme</li>
                                    <li class="star-menus"><a href="javascript:;"><i
                                                class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="bar"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 d-flex">

                <div class="card flex-fill student-space comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title"> Etudiants</h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table star-student table-hover table-center table-borderless table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
            
                                        <th class="text-end">Année</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>PRE2209</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="profile.html">
                                                <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}" width="25" alt="Star Students"> Soeng Souy
                                            </a>
                                        </td>
                                       
                                        <td class="text-end">
                                            <div>2019</div>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-6 d-flex">

                <div class="card flex-fill comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title ">Activité des étudiants </h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="activity-groups">
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-01.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>1st place in "Chess”</h4>
                                    <h5>John Doe won 1st place in "Chess"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>1 Day ago</span>
                                </div>
                            </div>
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-02.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Participated in "Carrom"</h4>
                                    <h5>Justin Lee participated in "Carrom"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>2 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-03.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Internation conference in "St.John School"</h4>
                                    <h5>Justin Leeattended internation conference in "St.John School"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>2 Week ago</span>
                                </div>
                            </div>
                            <div class="activity-awards mb-0">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-04.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Won 1st place in "Chess"</h4>
                                    <h5>John Doe won 1st place in "Chess"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>3 Day ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endif
@endsection
