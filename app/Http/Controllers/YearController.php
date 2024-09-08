<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use Toastr;

class YearController extends Controller
{
    public function index()
    {
        $years = Year::all();
        return view('year.index', compact('years'));
    }

    public function create()
    {
        return view('year.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Year::create($request->all());
            Toastr::success('Année ajoutée avec succès !', 'Succès');
            return redirect()->route('year.index');
        } catch (\Exception $e) {
            Toastr::error('Échec de l\'ajout de l\'année.', 'Erreur');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $year = Year::findOrFail($id);
        return view('year.edit', compact('year'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $year = Year::findOrFail($id);
            $year->update($request->all());
            Toastr::success('Année mise à jour avec succès !', 'Succès');
            return redirect()->route('year.index');
        } catch (\Exception $e) {
            Toastr::error('Échec de la mise à jour de l\'année.', 'Erreur');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            Year::findOrFail($id)->delete();
            Toastr::success('Année supprimée avec succès !', 'Succès');
            return redirect()->route('year.index');
        } catch (\Exception $e) {
            Toastr::error('Échec de la suppression de l\'année.', 'Erreur');
            return redirect()->back();
        }
    }
}
