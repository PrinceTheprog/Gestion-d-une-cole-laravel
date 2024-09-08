<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Notes;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class StudentController extends Controller
{
    /** index page student list */
    public function student()
    {
        $studentList = Student::all();
        return view('student.student', compact('studentList'));
    }

    /** index page student grid */
    public function studentGrid()
    {
        $studentList = Student::all();
        return view('student.student-grid', compact('studentList'));
    }

    /** student add page */
    public function studentAdd()
    {
        return view('student.add-student');
    }

    /** student save record */
    public function studentSaves(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|string',
        'date_of_birth' => 'required|date',
        'roll' => 'nullable|string|max:255',
        'blood_group' => 'required|string',
        'religion' => 'required|string',
        'email' => 'required|email|max:255|unique:students',
        'class' => 'required|string',
        'section' => 'required|string',
        'admission_id' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:20',
        'upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'parent_name' => 'nullable|string|max:255',
        'parent_profession' => 'nullable|string|max:255',
        'previous_school' => 'nullable|string|max:255',
        'last_class_attended' => 'nullable|string|max:255',
        'birth_certificate' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'school_report' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'registration_form' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);

        DB::beginTransaction();
        try {
            // Upload image files
            $upload_file = $request->upload ? rand() . '.' . $request->upload->extension() : null;
            $birth_certificate = $request->birth_certificate ? rand() . '.' . $request->birth_certificate->extension() : null;
            $school_report = $request->school_report ? rand() . '.' . $request->school_report->extension() : null;
            $registration_form = $request->registration_form ? rand() . '.' . $request->registration_form->extension() : null;



            
            if ($request->upload) {
                $request->upload->move(public_path('/images/student-photos/'), $upload_file);
            }

            if ($request->birth_certificate) {
                $request->birth_certificate->move(public_path('/images/student-documents/'), $birth_certificate);
            }

            if ($request->school_report) {
                $request->school_report->move(public_path('/images/student-documents/'), $school_report);
            }

            if ($request->registration_form) {
                $request->registration_form->move(public_path('/images/student-documents/'), $registration_form);
            }

            $student = new Student;
            $student->first_name           = $request->first_name;
            $student->last_name            = $request->last_name;
            $student->gender               = $request->gender;
            $student->date_of_birth        = $request->date_of_birth;
            $student->roll                 = $request->roll;
            $student->blood_group          = $request->blood_group;
            $student->religion             = $request->religion;
            $student->email                = $request->email;
            $student->class                = $request->class;
            $student->section              = $request->section;
            $student->admission_id         = $request->admission_id;
            $student->phone_number         = $request->phone_number;
            $student->parent_name          = $request->parent_name;
            $student->parent_profession    = $request->parent_profession;
            $student->previous_school_name = $request->previous_school_name;
            $student->last_class_attended  = $request->last_class_attended;
            $student->birth_certificate    = $birth_certificate;
            $student->school_report        = $school_report;
            $student->registration_form    = $registration_form;
            $student->upload               = $upload_file;
            $student->save();
            DB::commit();
            Toastr::success('Ajoutée avec succès !', 'Succès');
           

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Echec de l\'ajout du nouvel elève  :)', 'Erreur');
            return redirect()->back();
        }
    }

    /** view for edit student */
    public function studentEdit($id)
    {
        $studentEdit = Student::findOrFail($id);
        return view('student.edit-student', compact('studentEdit'));
    }

    /** update record */
    public function studentUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $student = Student::findOrFail($request->id);

            if ($request->upload) {
                if ($student->upload) {
                    unlink(public_path('/images/student-photos/' . $student->upload));
                }
                $upload_file = rand() . '.' . $request->upload->extension();
                $request->upload->move(public_path('/images/student-photos/'), $upload_file);
                $student->upload = $upload_file;
            }

            if ($request->birth_certificate) {
                if ($student->birth_certificate) {
                    unlink(public_path('/images/student-documents/' . $student->birth_certificate));
                }
                $birth_certificate = rand() . '.' . $request->birth_certificate->extension();
                $request->birth_certificate->move(public_path('/images/student-documents/'), $birth_certificate);
                $student->birth_certificate = $birth_certificate;
            }

            if ($request->school_report) {
                if ($student->school_report) {
                    unlink(public_path('/images/student-documents/' . $student->school_report));
                }
                $school_report = rand() . '.' . $request->school_report->extension();
                $request->school_report->move(public_path('/images/student-documents/'), $school_report);
                $student->school_report = $school_report;
            }

            if ($request->registration_form) {
                if ($student->registration_form) {
                    unlink(public_path('/images/student-documents/' . $student->registration_form));
                }
                $registration_form = rand() . '.' . $request->registration_form->extension();
                $request->registration_form->move(public_path('/images/student-documents/'), $registration_form);
                $student->registration_form = $registration_form;
            }

            $student->first_name           = $request->first_name;
            $student->last_name            = $request->last_name;
            $student->gender               = $request->gender;
            $student->date_of_birth        = $request->date_of_birth;
            $student->roll                 = $request->roll;
            $student->blood_group          = $request->blood_group;
            $student->religion             = $request->religion;
            $student->email                = $request->email;
            $student->class                = $request->class;
            $student->section              = $request->section;
            $student->admission_id         = $request->admission_id;
            $student->parent_name          = $request->parent_name;
            $student->phone_number         = $request->phone_number;
            $student->parent_profession    = $request->parent_profession;
            $student->previous_school_name = $request->previous_school_name;
            $student->last_class_attended  = $request->last_class_attended;
            $student->save();

            Toastr::success('Mis à jour avec succès !', 'Succès');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Echec de la mise à jour  :(', 'Erreurr');
            return redirect()->back();
        }
    }
    
    /** student delete */
    public function studentDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            $student = Student::findOrFail($request->id);

           
            $student->delete();
            DB::commit();
            Toastr::success('Supprimé avec succès!', 'Succès');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Echec de la suppression  :(', 'Erreur');
            echo($e);
        }
    }

    /** student profile page */

    public function studentProfile($id)
    {
       // $student = Student::with(['classe'])->findOrFail($id);  // Charge l'élève avec sa classe
        //$notes = Notes::with(['cours'])->where('student_id', $id)->get();  // Récupère toutes les notes de l'élève
        $studentProfile = Student::findOrFail($id);

        // Calculer la moyenne des notes (facultatif)
       // $average = $notes->avg('note');

        return view('student.student-profile', compact('studentProfile'));
    }

    /** Méthode pour générer le bulletin de l'élève en PDF */
    public function generateReportCard($id)
    {
        $student = Student::with(['classe'])->findOrFail($id);
        $notes = Notes::with(['cours'])->where('student_id', $id)->get();
        $average = $notes->avg('note');

        // Générer le PDF du bulletin avec une bibliothèque comme Dompdf ou Snappy
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('student.report-card', compact('student', 'notes', 'average'));

        return $pdf->download('bulletin_'.$student->name.'.pdf');
    }

    public function studentIndex($id)
    {
        $student = Student::findOrFail($id);
        return view('student.index', compact('student'));
    }
}
