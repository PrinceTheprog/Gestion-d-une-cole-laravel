<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    /** home dashboard */
    public function index()
    {
        $totalStudents = Student::count();
        $totalProfessors = Teacher::count();
        $totalUsers = User::count(); // Nombre d'inscrits
        $specificStudents = Student::where('gender', 'male')->count(); // Remplacez la condition et la valeur selon vos besoins
    
        return view('dashboard.home', compact('totalStudents', 'totalProfessors', 'totalUsers', 'specificStudents'));
    }

    /** profile user */
    public function userProfile()
    {
        return view('dashboard.profile');
    }

    /** teacher dashboard */
    public function teacherDashboardIndex()
    {
        return view('dashboard.teacher_dashboard');
    }

    /** student dashboard */
    public function studentDashboardIndex()
    {
        return view('dashboard.student_dashboard');
    }
}
