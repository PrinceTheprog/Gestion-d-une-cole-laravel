<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Teacher;
use App\Models\Classe;
use App\Models\Student;


use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;


class CoursController extends Controller
{
    // Display a list of courses
    public function cours()
    { 
        $professeurs = Teacher::all();
        $classe = Classe::all();
        $students = Student::all();
        $cours = Cours::all();
        $coursList = Cours::with(['teacher', 'classe'])->get();
        return view('cours.cours', compact('coursList','professeurs','cours'));
    }

    // Display the course grid
    public function coursGrid()
    {
        $coursList = Cours::all();
        return view('cours.cours-grid', compact('coursList'));
    }

    // Display the form to add a new course
    public function coursAdd()
    {
        $professeurs = Teacher::all();
        $students = Student::all();
        $classe = Classe::all();
        $coursList = Cours::all();
        return view('cours.add-cours', compact('coursList','professeurs','classe'));
    }

    // Save a new course
    public function coursSave(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
            'teacher_id'  => 'required|integer',  // Assuming these are foreign keys and should be integers
            'room_id'     => 'required|integer',
        ]);

        DB::beginTransaction();  // Start a transaction

        try {
            $cours = new Cours();
            $cours->name = $request->name;
            $cours->description = $request->description;
            $cours->teacher_id = $request->teacher_id;
            $cours->room_id = $request->room_id;
            $cours->save();

            DB::commit();  // Commit the transaction

            Toastr::success('Cours ajouté  :)', 'Succès');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();  // Rollback the transaction in case of an error

            Toastr::error('Cours non ajouté :( Réessayer.', 'Error');
            echo($e); // Preserve input in case of an error
        }
    }

    // Display the form to edit a student (assuming this should be for courses)
    public function coursEdit($id)
    {
        $professeurs = Teacher::all();
        $students = Student::all();
        $classe = Classe::all();
        $cours = Cours::findOrFail($id);  // Find course or fail
        return view('cours.edit-cours', compact('cours','professeurs','classe'));  // Update the view and variable name to reflect courses
    }

    // Update the course record
    public function coursUpdate(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
            'teacher_id'  => 'required|integer',
            'room_id'     => 'required|integer',
        ]);

        DB::beginTransaction();  // Start a transaction

        try {
            $cours = Cours::findOrFail($request->id);  // Find course or fail
            $cours->name = $request->name;
            $cours->description = $request->description;
            $cours->teacher_id = $request->teacher_id;
            $cours->room_id = $request->room_id;

            if ($request->hasFile('upload')) {
                $uploadFile = $request->file('upload')->store('public/cours-files');  // Save the file to storage
                $cours->upload = basename($uploadFile);  // Save the file name
            }

            $cours->save();

            DB::commit();  // Commit the transaction

            Toastr::success('Cours  mis à jour :)', 'Succèss');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();  // Rollback the transaction in case of an error

            Toastr::error('Cours non mis à jour :( Réessayer.', 'Erreur');
            return redirect()->back()->withInput();  // Preserve input in case of an error
        }
    }
    // Delete a course
public function coursDelete(Request $request)
{
    DB::beginTransaction();  // Start a transaction

    try {
        $cours = Cours::findOrFail($request->id);  // Find the course or fail
        $cours->delete();  // Delete the course

        DB::commit();  // Commit the transaction

        Toastr::success('Cours supprimé avec succès :)', 'Succès');
        return redirect()->back();

    } catch (\Exception $e) {
        DB::rollback();  // Rollback the transaction in case of an error

        Toastr::error('Cours non supprimé :( Réessayer.', 'Erreur');
        return redirect()->back();
    }
}

}
