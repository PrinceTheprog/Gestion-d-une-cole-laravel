<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\Classe;
use App\Models\Teacher;
use App\Models\Cours;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class NotesController extends Controller
{
    /** Display all notes */
    public function note()
    {
        $noteList = Notes::with(['student', 'cours'])->get();

        return view('note.note', compact('noteList'));
    }

    /** Display notes in grid view */
    public function noteGrid()
    {
        $noteList = Notes::all();
        return view('note.note-grid', compact('noteList'));
    }

    /** Display add note form */
    public function noteAdd()
    {
        $professeurs = Teacher::all();
        $students = Student::all();
        $cours = Cours::all();
        $classe = Classe::all();
        return view('note.add-note', compact('cours', 'classe', 'professeurs', 'students'));
    }

    /** Save a new note */
    public function noteSave(Request $request)
    {
        $request->validate([
            'student_id'  => 'required|integer',
            'course_id'   => 'required|integer',
            'grade'       => 'required|string',
            'comments'    => 'nullable|string',
            'note'        => 'required|string',
        ]);
        
        DB::beginTransaction();
        try {
            $note = new Notes;
            $note->student_id = $request->student_id;
            $note->course_id = $request->course_id;
            $note->grade = $request->grade;
            $note->comments = $request->comments;
            $note->note = $request->note;
            $note->save();

            DB::commit();
            Toastr::success('Note ajouté correctement :)', 'Succès');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Note non ajouté :)', 'Erreur');
            echo($e);
        }
    }

    public function noteEdit($id)
    {
        $noteEdit = Notes::find($id);
        $students = Student::all();
        $cours = Cours::all();
        
        return view('note.edit-note', compact('noteEdit', 'students', 'cours'));
    }
    
    public function noteUpdate(Request $request)
    {
        $request->validate([
            'student_id'  => 'required|integer',
            'course_id'   => 'required|integer',
            'note'        => 'required|string',
            'comments'    => 'nullable|string',
        ]);
    
        DB::beginTransaction();
        try {
            $note = Notes::find($request->id);
            $note->student_id = $request->student_id;
            $note->course_id = $request->course_id;
            $note->note = $request->note;
            $note->comments = $request->comments;
            $note->save();
    
            DB::commit();
            Toastr::success('Note mise à jour :)', 'Succès');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('La mise à jour de la note a échoué :)', 'Erreur');
            return redirect()->back();
        }
    }
    public function noteDelete(Request $request)
{
    DB::beginTransaction();  // Start a transaction

    try {
        $note = Notes::findOrFail($request->id);  // Find the course or fail
        $note->delete();  // Delete the course

        DB::commit();  // Commit the transaction

        Toastr::success('note supprimé avec succès :)', 'Succès');
        return redirect()->back();

    } catch (\Exception $e) {
        DB::rollback();  // Rollback the transaction in case of an error

        Toastr::error('note non supprimé :( Réessayer.', 'Erreur');
        return redirect()->back();
    }
}
    /** View note profile */
    public function noteProfile($id)
    {
        $noteProfile = Notes::find($id);
        return view('note.note-profile', compact('noteProfile'));
    }

    public function generateClassReport($classId)
    {
        $classe = Classe::with(['students'])->findOrFail($classId);
        $students = $classe->students;

        $reportData = [];
        foreach ($students as $student) {
            $notes = Notes::with(['cours'])->where('student_id', $student->id)->get();
            $average = $notes->avg('note');
            $reportData[] = [
                'student' => $student,
                'notes' => $notes,
                'average' => $average
            ];
        }

        // Générer le PDF du rapport de classe
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('notes.class-report', compact('classe', 'reportData'));

        return $pdf->download('rapport_classe_'.$classe->name.'.pdf');
    }
}
