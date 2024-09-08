<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TypeFormController;
use App\Http\Controllers\Setting;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\CoursController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** for side bar menu active */
function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('auth.login');
});
Route::get('event', function () {
    return view('event');
});
Route::get('planning', function () {
    return view('planning');
});

Route::get('calendrier', function () {
    return view('calendrier');
});


Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------login ------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('change/password', 'changePassword')->name('change/password');
});

// ----------------------------- register -------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');    
});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
    Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
    Route::get('teacher/dashboard', 'teacherDashboardIndex')->middleware('auth')->name('teacher/dashboard');
    Route::get('student/dashboard', 'studentDashboardIndex')->middleware('auth')->name('student/dashboard');
});

// ----------------------------- user controller -------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('list/users', 'index')->middleware('auth')->name('list/users');
    Route::post('change/password', 'changePassword')->name('change/password');
    Route::get('view/user/edit/{id}', 'userView')->middleware('auth');
    Route::post('user/update', 'userUpdate')->name('user/update');
    Route::post('user/delete', 'userDelete')->name('user/delete');
});

// ------------------------ setting -------------------------------//
Route::controller(Setting::class)->group(function () {
    Route::get('setting/page', 'index')->middleware('auth')->name('setting/page');
});

// ------------------------ student -------------------------------//
Route::controller(StudentController::class)->group(function () {
    Route::get('student/list', 'student')->middleware('auth')->name('student/list'); // list student
    Route::get('student/grid', 'studentGrid')->middleware('auth')->name('student/grid'); // grid student
    Route::get('student/add/page', 'studentAdd')->middleware('auth')->name('student/add/page'); // page student
    Route::post('student/add/save', 'studentSave')->name('student/add/save'); // save record student
    Route::post('student/add/saves', 'studentSaves')->name('student/add/saves'); // save record student
    Route::get('student/edit/{id}', 'studentEdit'); // view for edit
    Route::post('student/update', 'studentUpdate')->name('student/update'); // update record student
    Route::post('student/delete', 'studentDelete')->name('student/delete'); // delete record student
    Route::get('student/profile/{id}', 'studentProfile')->middleware('auth'); // profile student
    Route::get('student/index/{id}', 'studentIndex')->middleware('auth'); // profile student
});

// ------------------------ note -------------------------------//
Route::controller(NotesController::class)->group(function () {
    Route::get('note/list', 'note')->middleware('auth')->name('note/list'); // list student
    Route::get('note/grid', 'noteGrid')->middleware('auth')->name('note/grid'); // grid student
    Route::get('note/add/page', 'noteAdd')->middleware('auth')->name('note/add/page'); // page student
    Route::post('note/add/save', 'noteSave')->name('note/add/save'); // save record student
    Route::get('note/edit/{id}', 'noteEdit'); // view for edit
    Route::post('note/update', 'noteUpdate')->name('note/update'); // update record student
    Route::post('note/delete', 'noteDelete')->name('note/delete'); // delete record student
    Route::get('note/profile/{id}', 'noteProfile')->middleware('auth'); // profile student
});

// ------------------------ parent -------------------------------//
Route::controller(ParentController::class)->group(function () {
    Route::get('parent/list', 'parent')->middleware('auth')->name('parent/list'); // list student
    Route::get('parent/grid', 'parentGrid')->middleware('auth')->name('parent/grid'); // grid student
    Route::get('parent/add/page', 'parentAdd')->middleware('auth')->name('parent/add/page'); // page student
    Route::post('parent/add/save', 'parentSave')->name('parent/add/save'); // save record student
    Route::get('parent/edit/{id}', 'parentEdit'); // view for edit
    Route::post('parent/update', 'parentUpdate')->name('parent/update'); // update record student
    Route::post('parent/delete', 'parentDelete')->name('parent/delete'); // delete record student
    Route::get('parent/profile/{id}', 'parentProfile')->middleware('auth'); // profile student
});

// ------------------------ cours -------------------------------//
Route::controller(CoursController::class)->group(function () {
    Route::get('cours/list', 'cours')->middleware('auth')->name('cours/list'); // list student
    Route::get('cours/grid', 'coursGrid')->middleware('auth')->name('cours/grid'); // grid student
    Route::get('cours/add/page', 'coursAdd')->middleware('auth')->name('cours/add/page'); // page student
    Route::post('cours/add/save', 'coursSave')->name('cours/add/save'); // save record student
    Route::get('cours/edit/{id}', 'coursEdit'); // view for edit
    Route::post('cours/update', 'coursUpdate')->middleware('auth')->name('cours/update'); // update record student
    Route::post('cours/delete', 'coursDelete')->name('cours/delete'); // delete record student
    Route::get('cours/profile/{id}', 'coursProfile')->middleware('auth'); // profile student
});

// ------------------------ teacher -------------------------------//
Route::controller(TeacherController::class)->group(function () {
    Route::get('teacher/add/page', 'teacherAdd')->middleware('auth')->name('teacher/add/page'); // page teacher
    Route::get('teacher/list/page', 'teacherList')->middleware('auth')->name('teacher/list/page'); // page teacher
    Route::get('teacher/grid/page', 'teacherGrid')->middleware('auth')->name('teacher/grid/page'); // page grid teacher
    Route::post('teacher/save', 'saveRecord')->middleware('auth')->name('teacher/save'); // save record
    Route::get('teacher/edit/{id}', 'editRecord'); // view teacher record
    Route::post('teacher/update', 'updateRecordTeacher')->middleware('auth')->name('teacher/update'); // update record
    Route::post('teacher/delete', 'teacherDelete')->name('teacher/delete'); // delete record teacher
});

// ------------------------ timetable -------------------------------//
Route::controller(TimetableController::class)->group(function () {
    Route::get('timetable/add/page', 'timetableAdd')->middleware('auth')->name('timetable/add/page'); // page timetable
    Route::get('timetable/list/page', 'timetableList')->middleware('auth')->name('timetable/list/page'); // page timetable
    Route::get('timetable/grid/page', 'timetableGrid')->middleware('auth')->name('timetable/grid/page'); // page grid timetable
    Route::post('timetable/save', 'saveRecord')->middleware('auth')->name('timetable/save'); // save record
    Route::get('timetable/edit/{id}', 'edit'); // view timetable record
    Route::post('timetable/update', 'update')->middleware('auth')->name('timetable/update'); // update record
    Route::post('timetable/delete', 'timetableDelete')->name('timetable/delete'); // delete record timetable
});


// ----------------------- department -----------------------------//
Route::controller(DepartmentController::class)->group(function () {
    Route::get('department/list/page', 'departmentList')->middleware('auth')->name('department/list/page'); // department/list/page
    Route::get('department/add/page', 'indexDepartment')->middleware('auth')->name('department/add/page'); // page add department
    Route::get('department/edit/page', 'editDepartment')->middleware('auth')->name('department/edit/page'); // page add department
});



// ------------------------ attendance -------------------------------//
Route::controller(AttendanceController::class)->group(function () {
    Route::get('attendance/add/page', 'attendanceAdd')->middleware('auth')->name('attendance/add/page'); // page attendance
    Route::get('attendance/list/page', 'attendanceList')->middleware('auth')->name('attendance/list/page'); // page attendance
    Route::get('attendance/grid/page', 'attendanceGrid')->middleware('auth')->name('attendance/grid/page'); // page grid attendance
    Route::post('attendance/save', 'saveRecord')->middleware('auth')->name('attendance/save'); // save record
    Route::get('attendance/edit/{id}', 'attendanceEdit'); // view attendance record
    Route::post('attendance/update', 'attendanceUpdate')->middleware('auth')->name('attendance/update'); // update record
    Route::post('attendance/delete', 'attendanceDelete')->name('attendance/delete'); // delete record attendance
});