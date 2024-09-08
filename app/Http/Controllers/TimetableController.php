<?php

namespace App\Http\Controllers;
use App\Models\Timetable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Classe;
use App\Models\Cours;
use App\Models\Teacher;
use App\Models\Year;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Toastr;

class TimetableController extends Controller
{
    // Afficher la liste des emplois du temps
    public function timetableList()
    {
       
        $timetables = Timetable::all();
        return view('timetable.timetableList', compact('timetables'));
    }

    // Afficher le formulaire pour ajouter un emploi du temps
    public function timetableAdd()
    {
        $classes = Classe::all();
        $courses = Cours::all();
        $teachers = Teacher::all();
        $years = Year::all(); // Assurez-vous d'avoir un modèle pour les années
        $periods = Period::all(); // Assurez-vous d'avoir un modèle pour les périodes
        return view('timetable.timetableAdd', compact('classes', 'courses', 'teachers', 'years', 'periods'));
    }

    // Enregistrer un nouvel emploi du temps
    public function saveRecord(Request $request)
    {
        $request->validate([
            'classes_id' => 'required|exists:classes,id',
            'cours_id' => 'required|exists:cours,id',
            'teacher_id' => 'required|exists:teachers,id',
            'year_id' => 'required|exists:years,id',
            'period_id' => 'required|exists:periods,id',
            'schedule' => 'required|string',
        ]);

        try {
            Timetable::create($request->all());
            Toastr::success('Emploi du temps ajouté avec succès !', 'Succès');
            return redirect()->route('timetable/add/page');
        } catch (\Exception $e) {
            Toastr::error('Échec de l\'ajout de l\'emploi du temps.', 'Erreur');
            return redirect()->back();
        }
    }

    // Afficher le formulaire pour éditer un emploi du temps
    public function edit($id)
    {
        $timetable = Timetable::findOrFail($id);
        $classes = Classe::all();
        $courses = Cours::all();
        $teachers = Teacher::all();
        $years = Year::all();
        $periods = Period::all();
        return view('timetable.edit', compact('timetable', 'classes', 'courses', 'teachers', 'years', 'periods'));
    }

    // Mettre à jour un emploi du temps existant
    public function update(Request $request)
    {
        $request->validate([
            'classes_id' => 'required|integer',
            'cours_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'year_id' => 'required|integer',
            'period_id' => 'required|integer',
            'schedule' => 'required|string',
        ]);
       
            DB::beginTransaction();  // Start a transaction
    
        try {
                $timetable = Timetable::findOrFail($request->id);
                $timetable->class_id = $request->class_id;
                $timetable->cours_id = $request->cours_id;
                $timetable->teacher_id = $request->teacher_id;
                $timetable->year_id = $request->year_id;
                $timetable->period_id = $request->period_id;
                $timetable->schedule = $request->schedule;
                $timetable->save();
    
                DB::commit();  // Commit the transaction
            Toastr::success('Emploi du temps mis à jour avec succès !', 'Succès');
            return redirect()->back();
        }catch (\Exception $e) {
            DB::rollback(); 
            Toastr::error('Échec de la mise à jour de l\'emploi du temps.', 'Erreur');
            return redirect()->back();
        }
    }

    // Supprimer un emploi du temps
    public function timetableDelete(Request $request)
{
    DB::beginTransaction();  // Start a transaction

    try {
        $timetable = Timetable::findOrFail($request->id);  // Find the course or fail
        $timetable->delete();  // Delete the course

        DB::commit();  // Commit the transaction

        Toastr::success('Cours supprimé avec succès :)', 'Succès');
        return redirect()->back();

    } catch (\Exception $e) {
        DB::rollback();  // Rollback the transaction in case of an error

        Toastr::error('Cours non supprimé :( Réessayer.', 'Erreur');
        return redirect()->back();
    }
}
    public function destroy($id)
    {
        try {
            Timetable::findOrFail($id)->delete();
            Toastr::success('Emploi du temps supprimé avec succès !', 'Succès');
            return redirect()->route('timetable.index');
        } catch (\Exception $e) {
            Toastr::error('Échec de la suppression de l\'emploi du temps.', 'Erreur');
            echo($e);
        }
    }
}
