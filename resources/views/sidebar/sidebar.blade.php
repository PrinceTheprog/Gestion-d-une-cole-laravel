<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- Menu Principal -->
                <li class="menu-title">
                    <span> Menu Principal</span>
                </li>
                <li><a href="{{ route('home') }}" class="{{ set_active(['home']) }}"><i class="feather-home"></i> Tableau de bord Admin</a></li>

                <!-- Gestion des Professeurs -->
                @if (Session::get('role_name') === 'Teachers')
                <li class="menu-title">
                    <span> Gestion des Professeurs</span>
                </li>
                <li class="submenu {{ set_active(['home', 'teacher/dashboard']) }}">
                    <a href="#"><i class="feather-grid"></i> Tableau de bord <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('teacher/dashboard') }}" class="{{ set_active(['teacher/dashboard']) }}">Tableau de bord Professeur</a></li>
                    </ul>
                </li>
                @endif

                <!-- Gestion des Étudiants -->
                @if (Session::get('role_name') === 'Student')
                <li class="menu-title">
                    <span> Gestion des Étudiants</span>
                </li>
                <li class="submenu {{ set_active(['home', 'student/dashboard']) }}">
                    <a href="#"><i class="feather-grid"></i> Tableau de bord <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('student/dashboard') }}" class="{{ set_active(['student/dashboard']) }}">Tableau de bord Étudiant</a></li>
                    </ul>
                </li>
                @endif

                <!-- Gestion des Administrateurs -->
                @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
                <li class="menu-title">
                    <span> Gestion des Administrateurs</span>
                </li>
                <li class="submenu {{ set_active(['home']) }}">
                    <a href="#"><i class="feather-home"></i> Tableau de bord <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('home') }}" class="{{ set_active(['home']) }}">Tableau de bord</a></li>
                    </ul>
                </li>
                <li class="submenu {{ set_active(['list/users']) }} {{ request()->is('view/user/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="feather-users"></i> Utilisateurs <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('list/users') }}" class="{{ set_active(['list/users']) }} {{ request()->is('view/user/edit/*') ? 'active' : '' }}">Liste des utilisateurs</a></li>
                    </ul>
                </li>
                <li class="submenu {{ set_active(['student/list', 'student/grid', 'student/add/page']) }} {{ request()->is('student/edit/*') || request()->is('student/profile/*') ? 'active' : '' }}">
                    <a href="#"><i class="feather-users"></i> Élèves <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('student/list') }}" class="{{ set_active(['student/list', 'student/grid']) }}">Liste des Élèves</a></li>
                        <li><a href="{{ route('student/add/page') }}" class="{{ set_active(['student/add/page']) }}">Ajouter un Élève</a></li>
                    </ul>
                </li>
                <li class="submenu {{ set_active(['teacher/add/page', 'teacher/list/page', 'teacher/grid/page', 'teacher/edit']) }} {{ request()->is('teacher/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="feather-book"></i> Professeurs <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('teacher/list/page') }}" class="{{ set_active(['teacher/list/page', 'teacher/grid/page']) }}">Liste des Professeurs</a></li>
                        <li><a href="{{ route('teacher/add/page') }}" class="{{ set_active(['teacher/add/page']) }}">Ajouter un Professeur</a></li>
                    </ul>
                </li>
                <li class="submenu {{ set_active(['cours/add/page', 'cours/edit/page']) }}">
                    <a href="#"><i class="feather-book-open"></i> Cours <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('cours/list') }}" class="{{ set_active(['cours/list']) }}">Liste des Cours</a></li>
                        <li><a href="{{ route('cours/add/page') }}" class="{{ set_active(['cours/add/page']) }}">Ajouter un Cours</a></li>
                    </ul>
                </li>
                <li class="submenu {{ set_active(['note/list', 'note/grid', 'note/add/page']) }} {{ request()->is('note/edit/*') || request()->is('note/profile/*') ? 'active' : '' }}">
                    <a href="#"><i class="feather-file-text"></i> Notes <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('note/list') }}" class="{{ set_active(['note/list', 'note/grid']) }}">Liste des Notes</a></li>
                        <li><a href="{{ route('note/add/page') }}" class="{{ set_active(['note/add/page']) }}">Ajouter une Note</a></li>
                    </ul>
                </li>
                <li class="submenu {{ set_active(['timetable/add/page', 'timetable/edit/page']) }} {{ request()->is('timetable/edit/*') || request()->is('timetable/profile/*') ? 'active' : '' }}">
                    <a href="#"><i class="feather-calendar"></i> Emploi du temps <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('timetable/list/page') }}" class="{{ set_active(['timetable/list/page']) }}">Voir les emplois du temps</a></li>
                        <li><a href="{{ route('timetable/add/page') }}" class="{{ set_active(['timetable/add/page']) }}">Ajouter un emploi du temps</a></li>
                    </ul>
                </li>
                <li class="submenu {{ set_active(['attendance/add/page', 'attendance/edit/page']) }} {{ request()->is('attendance/edit/*') || request()->is('attendance/profile/*') ? 'active' : '' }}">
                    <a href="#"><i class="feather-clock"></i> Assiduité <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('attendance/list/page') }}" class="{{ set_active(['attendance/list/page']) }}">Voir les assiduités</a></li>
                        <li><a href="{{ route('attendance/add/page') }}" class="{{ set_active(['attendance/add/page']) }}">Ajouter une assiduité</a></li>
                    </ul>
                </li>
                @endif

                <!-- Paramètres -->
                <li class="menu-title">
                    <span> Paramètres</span>
                </li>
                <li class="{{ set_active(['setting/page']) }}">
                    <a href="{{ route('setting/page') }}">
                        <i class="feather-settings"></i> 
                        <span>Paramètre</span>
                    </a>
                </li>

                <!-- Management Étudiant -->
                @if (Session::get('role_name') === 'Student')
                <li class="menu-title">
                    <span> Gestion Étudiant</span>
                </li>
                <li class="submenu {{ set_active(['note/list', 'note/grid', 'note/add/page']) }} {{ request()->is('student/edit/*') || request()->is('student/profile/*') ? 'active' : '' }}">
                    <a href="#"><i class="feather-star"></i> Note <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('note/list') }}" class="{{ set_active(['note/list', 'note/grid']) }}">Voir ma note</a></li>
                        <li><a href="{{ route('note/add/page') }}" class="{{ set_active(['note/add/page']) }}">Faire une réclamation</a></li>
                    </ul>
                </li>
                <li class="submenu {{ set_active(['cours/list', 'cours/grid', 'cours/add/page']) }} {{ request()->is('cours/edit/*') || request()->is('student/profile/*') ? 'active' : '' }}">
                    <a href="#"><i class="feather-book"></i> Cours <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('cours/list') }}" class="{{ set_active(['cours/list', 'cours/grid']) }}">Liste des Cours</a></li>
                        <li><a href="{{ route('cours/add/page') }}" class="{{ set_active(['cours/add/page']) }}">Faire une demande de participation à un cours</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
