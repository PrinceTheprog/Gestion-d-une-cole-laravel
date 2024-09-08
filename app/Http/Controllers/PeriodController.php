<?php 
namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::all();
        return view('period.index', compact('periods'));
    }

    public function create()
    {
        return view('period.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Period::create($request->all());
            Toastr::success('Période ajoutée avec succès !', 'Succès');
            return redirect()->route('period.index');
        } catch (\Exception $e) {
            Toastr::error('Échec de l\'ajout de la période.', 'Erreur');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $period = Period::findOrFail($id);
        return view('period.edit', compact('period'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $period = Period::findOrFail($id);
            $period->update($request->all());
            Toastr::success('Période mise à jour avec succès !', 'Succès');
            return redirect()->route('period.index');
        } catch (\Exception $e) {
            Toastr::error('Échec de la mise à jour de la période.', 'Erreur');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            Period::findOrFail($id)->delete();
            Toastr::success('Période supprimée avec succès !', 'Succès');
            return redirect()->route('period.index');
        } catch (\Exception $e) {
            Toastr::error('Échec de la suppression de la période.', 'Erreur');
            return redirect()->back();
        }
    }
}
